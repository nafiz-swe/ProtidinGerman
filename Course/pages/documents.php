<?php
$student_email = $selExmneeData['student_email'] ?? null;

$course_name = '';
$documents = [];

if ($student_email) {
    $stmt = $conn->prepare("SELECT course_name FROM students_tbl WHERE student_email = ?");
    $stmt->execute([$student_email]);
    $student = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($student) {
        $course_name = trim($student['course_name']);

        $stmt = $conn->prepare("SELECT * FROM course_documents WHERE course_section = ? ORDER BY uploaded_at DESC");
        $stmt->execute([$course_name]);
        $documents = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>

<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <!-- <div class="page-title-icon">
                        <i class="pe-7s-bookmarks icon-gradient bg-love-kiss"></i>
                    </div> -->
                    <div>Study Materials for <?= htmlspecialchars($course_name) ?></div>
                </div>
            </div>
        </div>

        <div class="document-container" style="max-width:1000px; margin:30px auto; background:#f5f5f5; padding:20px; border-radius:10px;">
            <h3 style="text-align:center; margin-bottom:20px;">Available Course Documents</h3>

            <?php if (count($documents) > 0): ?>
                <div style="overflow-x:auto;">
                    <table style="width:100%; min-width:800px; border-collapse: collapse; font-size:14px;">
                        <thead>
                            <tr style="background:#2c3e50; color:#fff; text-align:center;">
                                <th>#</th>
                                <th>Course</th>
                                <th>Type</th>
                                <th>Title</th>
                                <th>Preview</th>
                                <th>Uploaded At</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($documents as $i => $doc): ?>
                                <tr style="border:1px solid #ddd; text-align:center;">
                                    <td><?= $i + 1 ?></td>
                                    <td><?= htmlspecialchars($doc['course_section']) ?></td>
                                    <td><?= htmlspecialchars($doc['note_type']) ?></td>
                                    <td><?= htmlspecialchars($doc['title']) ?></td>
                                    <td style="max-width:220px;">
                                        <?php
                                            $fileUrl = '';
                                            if (!empty($doc['app_web_link'])) {
                                                $fileUrl = $doc['app_web_link'];
                                            } elseif (!empty($doc['filename'])) {
                                                $fileUrl = '/Course/uploads/' . rawurlencode($doc['filename']);
                                            }

                                            if (!empty($fileUrl)):
                                                if ($doc['note_type'] === 'PDF') {
                                                    echo "<button class='view-pdf-btn' onclick=\"window.open('{$fileUrl}#toolbar=0&navpanes=0&scrollbar=0', '_blank')\">View PDF</button>";
                                                } elseif ($doc['note_type'] === 'Audio') {
                                                    echo "<button class='view-pdf-btn' onclick='openMediaPlayer(\"{$fileUrl}\", \"audio\")'>Play Audio</button>";
                                                } elseif ($doc['note_type'] === 'Video') {
                                                    echo "<button class='view-pdf-btn' onclick='openMediaPlayer(\"{$fileUrl}\", \"video\")'>Play Video</button>";
                                                } else {
                                                    echo "<a href='{$fileUrl}' target='_blank' class='view-pdf-btn'>Visit Web/App</a>";
                                                }
                                            else:
                                                echo "N/A";
                                            endif;
                                        ?>
                                    </td>
                                    <td><?= date("d M Y, h:i A", strtotime($doc['uploaded_at'])) ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            <?php else: ?>
                <p style="text-align:center;">No documents found for your course.</p>
            <?php endif; ?>
        </div>
    </div>
</div>

<script>
function openMediaPlayer(url, type) {
    const features = "width=600,height=400,resizable=yes,scrollbars=no";
    let playerHTML = `
        <html>
        <head><title>Media Player</title></head>
        <body style="margin:0; display:flex; justify-content:center; align-items:center; height:100vh; background:#222;">
    `;

    if (type === "audio") {
        playerHTML += `
            <audio controls autoplay style="width:90%;" controlsList="nodownload nofullscreen noremoteplayback" oncontextmenu="return false;">
                <source src="${url}" type="audio/mpeg">
                Your browser does not support the audio element.
            </audio>
        `;
    } else if (type === "video") {
        playerHTML += `
            <video controls autoplay style="width:90%; max-height:90vh;" controlsList="nodownload nofullscreen noremoteplayback" oncontextmenu="return false;">
                <source src="${url}" type="video/mp4">
                Your browser does not support the video element.
            </video>
        `;
    }

    playerHTML += `
        </body>
        </html>
    `;

    const playerWindow = window.open("", "_blank", features);
    playerWindow.document.write(playerHTML);
    playerWindow.document.close();
}
</script>

<style>
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
th {
    padding: 10px;
}

</style>
