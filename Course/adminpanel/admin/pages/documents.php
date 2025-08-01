<?php
ob_start();
include("../../conn.php");

// ----------------------------
// Upload or Update Document
if ($_SERVER['REQUEST_METHOD'] === 'POST' && !isset($_POST['ajax_delete'])) {
    $id = $_POST['doc_id'] ?? null;
    $section = $_POST['course_section'];
    $noteType = $_POST['note_type'];
    $title = $_POST['title'];
    $appWebLink = $_POST['app_web_link'] ?? null;

    $filename = null;
    if (isset($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = '../../uploads/';
        if (!is_dir($uploadDir)) mkdir($uploadDir, 0777, true);

        $filename = time() . '_' . basename($_FILES['file']['name']);
        $targetFile = $uploadDir . $filename;

        move_uploaded_file($_FILES['file']['tmp_name'], $targetFile);
    }

    if ($id) {
        // Update
        if ($noteType === 'Web/App') {
            $stmt = $conn->prepare("UPDATE course_documents SET course_section=?, note_type=?, title=?, app_web_link=?, filename=NULL WHERE id=?");
            $stmt->execute([$section, $noteType, $title, $appWebLink, $id]);
        } else {
            if ($filename) {
                $stmt = $conn->prepare("UPDATE course_documents SET course_section=?, note_type=?, title=?, filename=?, app_web_link=NULL WHERE id=?");
                $stmt->execute([$section, $noteType, $title, $filename, $id]);
            } else {
                $stmt = $conn->prepare("UPDATE course_documents SET course_section=?, note_type=?, title=?, app_web_link=NULL WHERE id=?");
                $stmt->execute([$section, $noteType, $title, $id]);
            }
        }
    } else {
        // Insert new
        if ($noteType === 'Web/App') {
            $stmt = $conn->prepare("INSERT INTO course_documents (course_section, note_type, title, app_web_link) VALUES (?, ?, ?, ?)");
            $stmt->execute([$section, $noteType, $title, $appWebLink]);
        } else {
            if ($filename) {
                $stmt = $conn->prepare("INSERT INTO course_documents (course_section, note_type, title, filename) VALUES (?, ?, ?, ?)");
                $stmt->execute([$section, $noteType, $title, $filename]);
            }
        }
    }
}

// Read all documents
$stmt = $conn->query("SELECT * FROM course_documents ORDER BY uploaded_at DESC");
$documents = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<style>
    .form-container {
        background: #f9f9f9;
        padding: 25px;
        border-radius: 12px;
        box-shadow: 0 0 10px rgba(0,0,0,0.1);
        max-width: 700px;
        margin: auto;
    }
    .form-container h3 {
        text-align: center;
        margin-bottom: 20px;
        color: #34495e;
    }
    .form-group {
        margin-bottom: 15px;
    }
    .form-control, .btn {
        border-radius: 8px;
    }
    table {
        margin-top: 40px;
        width: 100%;
        border-collapse: collapse;
        font-size: 14px;
        background: #fff;
    }
    table th, table td {
        padding: 10px;
        border: 1px solid #ddd;
        text-align: center;
    }
    table th {
        background: #34495e;
        color: white;
    }

    /* টেবিলের প্যারেন্ট ডিভ স্ক্রল করাবে */
.table-wrapper {
    width: 100%;
    max-width: 1000px; /* তোমার প্রয়োজন মতো বড়াও/ছোটাও করতে পারো */
    margin: 40px auto;
    overflow-x: auto; /* হরাইজন্টাল স্ক্রল এনেবল */
}

/* টেবিল স্টাইল ঠিক রাখবে */
.table-wrapper table {
    width: 100%;
    min-width: 800px; /* মিনিমাম প্রস্থ যাতে স্ক্রল আসে */
    border-collapse: collapse;
    font-size: 14px;
    background: #fff;
}

/* টেবিলের ভিতর সেল স্টাইল */
.table-wrapper table th,
.table-wrapper table td {
    padding: 10px;
    border: 1px solid #ddd;
    text-align: center;
}

.table-wrapper table th {
    background: #34495e;
    color: white;
}
.document-container{
    margin-top: 100px !important;
}
.view-pdf-btn {
    background-color: #7FBF4D;
    color: white;
    border: none;
    padding: 6px 14px;
    margin: 5px auto;
    border-radius: 6px;
    cursor: pointer;
    font-weight: 600;
    font-size: 14px;
    transition: background-color 0.3s ease;
    display: inline-block;
    text-decoration: none;
}

.view-pdf-btn:hover {
    background-color: #6aa237;
    text-decoration: none;
    color: white;
}

</style>

<div class="app-main__outer">
    <div id="refreshData">
        <div class="app-main__inner">
            <div class="app-page-title">
                <div class="page-title-wrapper">
                    <div class="page-title-heading">
                        <div class="page-title-icon">
                            <i class="pe-7s-news-paper icon-gradient bg-mean-fruit"></i>
                        </div>
                        <div>Class Materials</div>
                    </div>
                </div>
            </div>

            <!-- Upload / Edit Form -->
            <div class="form-container">
                <h3 id="formTitle">Upload Course Document</h3>
                <form method="POST" enctype="multipart/form-data" id="mainForm">
                    <input type="hidden" name="doc_id" id="doc_id" value="">
                    <div class="form-group">
                        <label>Course Section</label>
                        <select name="course_section" id="course_section" class="form-control" required>
                            <option value="">Select Course</option>
                            <option value="A1">A1</option>
                            <option value="A2">A2</option>
                            <option value="B1">B1</option>
                            <option value="Exam Preparation">B1 Exam Preparation</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Note Type</label>
                        <select name="note_type" id="note_type" class="form-control" required onchange="toggleFileOrLink(this.value)">
                            <option value="">Select Type</option>
                            <option value="Audio">Audio</option>
                            <option value="Video">Video</option>
                            <option value="PDF">PDF</option>
                            <option value="Web/App">Web/App</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Note Title / Topic</label>
                        <input type="text" name="title" id="title" class="form-control" placeholder="Enter title" required>
                    </div>
                    <div class="form-group" id="fileInputDiv">
                        <label>Upload File</label>
                        <input type="file" name="file" class="form-control" id="fileInput" >
                    </div>
                    <div class="form-group" id="appWebLinkDiv" style="display:none;">
                        <label>App/Web Link</label>
                        <input type="url" name="app_web_link" id="app_web_link" class="form-control" placeholder="Enter app or web link">
                    </div>
                    <button type="submit" class="btn btn-primary btn-block" id="formSubmitBtn">Upload Document</button>
                </form>
            </div>

            <div class="document-container" style="max-width:1000px; margin:30px auto; background:#f5f5f5; padding:20px; border-radius:10px;">
                <h3 style="text-align:center; margin-top:20px;">All Uploaded Documents</h3>

                <?php if (count($documents)): ?>
                    <div style="overflow-x:auto;">
                        <table style="width:100%; min-width:800px; border-collapse: collapse; font-size:14px;">
                            <thead>
                                <tr style="background:#2c3e50; color:#fff; text-align:center;">
                                    <th>SL/No</th>
                                    <th>Course</th>
                                    <th>Type</th>
                                    <th>Title</th>
                                    <th>Preview</th>
                                    <th>Uploaded At</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($documents as $i => $doc): ?>
                                    <tr id="document-row-<?= $doc['id'] ?>" style="border:1px solid #ddd; text-align:center;">
                                        <td><?= $i + 1 ?></td>
                                        <td><?= htmlspecialchars($doc['course_section']) ?></td>
                                        <td><?= htmlspecialchars($doc['note_type']) ?></td>
                                        <td><?= htmlspecialchars($doc['title']) ?></td>
                                        <td>
                                            <?php 
                                                $fileUrl = '';
                                                if (!empty($doc['app_web_link'])) {
                                                    $fileUrl = htmlspecialchars($doc['app_web_link']);
                                                } elseif (!empty($doc['filename'])) {
                                                    $fileUrl = '../../uploads/' . rawurlencode($doc['filename']);
                                                }

                                                if (!empty($fileUrl)):
                                                    if ($doc['note_type'] === 'PDF') {
                                                        echo "<button class='view-pdf-btn' onclick=\"window.open('{$fileUrl}', '_blank')\">View PDF</button>";
                                                    } elseif ($doc['note_type'] === 'Audio') {
                                                        echo "<a href='{$fileUrl}' target='_blank' class='view-pdf-btn'>Play Audio</a>";
                                                    } elseif ($doc['note_type'] === 'Video') {
                                                        echo "<a href='{$fileUrl}' target='_blank' class='view-pdf-btn'>Play Video</a>";
                                                    } else {
                                                        echo "<a href='{$fileUrl}' target='_blank' class='view-pdf-btn'>Visit Web/App</a>";
                                                    }
                                                else:
                                                    echo "-";
                                                endif;
                                            ?>
                                        </td>
                                        <td><?= date("d M Y, h:i A", strtotime($doc['uploaded_at'])) ?></td>
                                        <td>
                                            <button onclick="editDoc(<?= $doc['id'] ?>, '<?= htmlspecialchars($doc['course_section'], ENT_QUOTES) ?>', '<?= htmlspecialchars($doc['note_type'], ENT_QUOTES) ?>', '<?= htmlspecialchars(addslashes($doc['title']), ENT_QUOTES) ?>', '<?= htmlspecialchars($doc['app_web_link'] ?? '', ENT_QUOTES) ?>')" class="btn btn-sm btn-warning">Edit</button>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                <?php else: ?>
                    <p style="text-align:center;">No documents found for your course.</p>
                <?php endif; ?>
            </div>

        </div>
    </div>
</div>

<!-- Media Modal -->
<div id="mediaModal" style="display:none; position:fixed; top:0; left:0; width:100%; height:100%; background:rgba(0,0,0,0.8); z-index:9999; justify-content:center; align-items:center;">
    <div style="position:relative; background:#000; padding:10px; border-radius:8px; max-width:90%; max-height:90%;">
        <span onclick="closeMediaModal()" style="position:absolute; top:-10px; right:-10px; font-size:25px; cursor:pointer; color:#fff;">&times;</span>
        <video id="videoPlayer" controls style="max-width:100%; display:none;" oncontextmenu="return false;">
            Your browser does not support the video tag.
        </video>
        <audio id="audioPlayer" controls style="max-width:100%; display:none;" oncontextmenu="return false;">
            Your browser does not support the audio tag.
        </audio>
    </div>
</div>

<script>
function openMediaPlayer(url, type) {
    const modal = document.getElementById('mediaModal');
    const video = document.getElementById('videoPlayer');
    const audio = document.getElementById('audioPlayer');

    video.style.display = 'none';
    audio.style.display = 'none';

    if (type === 'video') {
        video.src = url;
        video.style.display = 'block';
        video.play();
    } else if (type === 'audio') {
        audio.src = url;
        audio.style.display = 'block';
        audio.play();
    }

    modal.style.display = 'flex';
}

function closeMediaModal() {
    const modal = document.getElementById('mediaModal');
    const video = document.getElementById('videoPlayer');
    const audio = document.getElementById('audioPlayer');

    video.pause();
    audio.pause();
    video.src = '';
    audio.src = '';
    modal.style.display = 'none';
}

function toggleFileOrLink(noteType) {
    const fileDiv = document.getElementById('fileInputDiv');
    const linkDiv = document.getElementById('appWebLinkDiv');

    if (noteType === 'Web/App') {
        fileDiv.style.display = 'none';
        linkDiv.style.display = 'block';
        document.getElementById('fileInput').value = ''; // ক্লিয়ার ফাইল ইনপুট
        document.getElementById('app_web_link').required = true;
        document.getElementById('fileInput').required = false;
    } else {
        fileDiv.style.display = 'block';
        linkDiv.style.display = 'none';
        document.getElementById('app_web_link').value = ''; // ক্লিয়ার লিংক ইনপুট
        document.getElementById('app_web_link').required = false;
        document.getElementById('fileInput').required = true;
    }
}

function editDoc(id, section, noteType, title, appWebLink) {
    document.getElementById('doc_id').value = id;
    document.getElementById('course_section').value = section;
    document.getElementById('note_type').value = noteType;
    document.getElementById('title').value = title;

    toggleFileOrLink(noteType);

    if(noteType === 'Web/App') {
        document.getElementById('app_web_link').value = appWebLink;
    } else {
        document.getElementById('app_web_link').value = '';
    }

    document.getElementById('formTitle').innerText = 'Update Course Document';
    document.getElementById('formSubmitBtn').innerText = 'Update Document';

    // Optional: Scroll to form or focus for better UX
    document.getElementById('mainForm').scrollIntoView({behavior: 'smooth'});
}
</script>
