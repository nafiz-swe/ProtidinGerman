<?php
$batchId = $_GET['id'] ?? null;

$titles = [
    'A1' => 'Deutsch A1 Course Details',
    'A2' => 'Deutsch A2 Course Details',
    'B1' => 'Deutsch B1 Course Details',
    'ExamPreparation' => 'B1 Exam Preparation Course Details',
];

$descriptions = [
    'A1' => 'A1 লেভেলের কোর্স ডিটেলস এখানে দেখানো হবে।',
    'A2' => 'A2 লেভেলের কোর্স ডিটেলস এখানে দেখানো হবে।',
    'B1' => 'B1 লেভেলের কোর্স ডিটেলস এখানে দেখানো হবে।',
    'ExamPreparation' => 'B1 Exam Preparation কোর্স ডিটেলস এখানে দেখানো হবে।',
];

$classList = [
    'A1' => [
        ['title' => 'Letter Pronunciation', 'description' => 'Letter গুলোর উচ্চারণ শেখানো হবে।'],
        ['title' => 'Number Pronunciation', 'description' => 'সংখ্যা কিভাবে উচ্চারণ করতে হয়।'],
        ['title' => 'Nominativ', 'description' => 'জার্মান ভাষায় Nominativ কিভাবে ব্যবহৃত হয়।'],
        ['title' => 'Verb Conjugation - Präsens', 'description' => 'Verb গুলোর বর্তমান কালের রূপ।'],
        ['title' => 'Personal Pronouns', 'description' => 'Ich, du, er, sie ইত্যাদি।'],
        ['title' => 'Sein ও Haben Verb', 'description' => 'জার্মান ভাষার অন্যতম গুরুত্বপূর্ণ verb।'],
        ['title' => 'Fragen stellen', 'description' => 'প্রশ্ন কিভাবে করতে হয়।'],
        ['title' => 'W-Fragen & Ja/Nein Fragen', 'description' => 'কি, কেন, কখন টাইপ প্রশ্ন।'],
        ['title' => 'Possessivartikel', 'description' => 'Mein, dein, sein, ইত্যাদি।'],
        ['title' => 'Artikel: der, die, das', 'description' => 'নির্দিষ্ট আর্টিকেল শেখা।'],
        ['title' => 'Negation with nicht & kein', 'description' => 'না/নেগেটিভ বাক্য গঠন।'],
        ['title' => 'Plurals', 'description' => 'বহুবচন কিভাবে করা হয়।'],
        ['title' => 'Modalverben (können, müssen)', 'description' => 'Modality বোঝানো verb।'],
        ['title' => 'Imperativ', 'description' => 'আদেশমূলক বাক্য।'],
        ['title' => 'Accusativ Case', 'description' => 'কার্যবাচক বা সরাসরি অবজেক্ট।'],
        ['title' => 'Trennbare Verben', 'description' => 'বিচ্ছিন্নযোগ্য verb।'],
        ['title' => 'Time Expressions', 'description' => 'সময় বোঝানোর উপায়।'],
        ['title' => 'Adjective Endings - Nominativ', 'description' => 'বিশেষণ এর সঠিক রূপ।'],
        ['title' => 'Prepositions with Accusative', 'description' => 'durch, für, gegen, ohne, um।'],
        ['title' => 'Daily Routine Vocabulary', 'description' => 'প্রতিদিনের কাজকর্ম।'],
        ['title' => 'Family and Relations Vocabulary', 'description' => 'পরিবার সম্পর্কিত শব্দ।'],
        ['title' => 'Directions & Locations', 'description' => 'পথ নির্দেশ ও অবস্থান।'],
        ['title' => 'Listening Practice', 'description' => 'শোনার দক্ষতা উন্নয়ন।'],
        ['title' => 'Speaking Practice & Mock Test', 'description' => 'মক টেস্ট ও কথাবার্তা।'],
    ],
    'A2' => [
        ['title' => 'Präteritum of haben & sein', 'description' => 'অতীতকাল - ছিলাম, ছিলো ইত্যাদি।'],
        ['title' => 'Dativ Case', 'description' => 'অপ্রত্যক্ষ অবজেক্ট বোঝাতে ব্যবহৃত।'],
        ['title' => 'Two-way Prepositions', 'description' => 'an, auf, hinter ইত্যাদি।'],
        ['title' => 'Dative Verbs', 'description' => 'helfen, gefallen, danken ইত্যাদি।'],
        ['title' => 'Wechselpräpositionen', 'description' => 'জায়গা ও গন্তব্য বোঝাতে ব্যবহৃত।'],
        ['title' => 'Relativsätze', 'description' => 'Relative বাক্য গঠন।'],
        ['title' => 'Konjunktionen: weil, dass', 'description' => 'Subordinating conjunctions।'],
        ['title' => 'Reflexive Verben', 'description' => 'নিজের উপর কার্য ঘটে এমন verb।'],
        ['title' => 'Perfect Tense (Perfekt)', 'description' => 'Gesprochen - বলা হয়েছে এরকম বাক্য।'],
        ['title' => 'Beruf und Arbeit', 'description' => 'চাকরি ও পেশা সম্পর্কিত শব্দ।'],
        ['title' => 'Health and Körperteile', 'description' => 'স্বাস্থ্য ও দেহের অংশ।'],
        ['title' => 'Modalverben in Präteritum', 'description' => 'Modals in past form।'],
        ['title' => 'Adjective Endings - Accusativ & Dativ', 'description' => 'বিশেষণ রূপ পরিবর্তন।'],
        ['title' => 'Nebensatz mit wenn', 'description' => 'যখন... তখন...।'],
        ['title' => 'Sätze mit damit & um ... zu', 'description' => 'উদ্দেশ্য বোঝানো বাক্য।'],
        ['title' => 'Zukunft mit werden', 'description' => 'ভবিষ্যৎ কালের বাক্য।'],
        ['title' => 'Konjunktiv II - höflich bitten', 'description' => 'ভদ্র অনুরোধ।'],
        ['title' => 'Trennbare & Untrennbare Verben', 'description' => 'বিচ্ছিন্নযোগ্য ও অ-বিচ্ছিন্ন verb।'],
        ['title' => 'Telefonieren & Termine machen', 'description' => 'ফোনে কথা ও অ্যাপয়েন্টমেন্ট।'],
        ['title' => 'Wohnen & Möbel', 'description' => 'বসবাস ও আসবাব।'],
        ['title' => 'Essen & Rezepte', 'description' => 'খাবার ও রেসিপি।'],
        ['title' => 'Reisen und Verkehr', 'description' => 'ভ্রমণ ও যানবাহন।'],
        ['title' => 'Listening Practice', 'description' => 'শোনার দক্ষতা উন্নয়ন।'],
        ['title' => 'Speaking Practice & Mock Test', 'description' => 'মক টেস্ট ও কথাবার্তা।'],
    ],
    'B1' => [
        ['title' => 'Konjunktiv II (Wünsche & Träume)', 'description' => 'Ich wünschte, ich hätte mehr Zeit.'],
        ['title' => 'Passiv Präsens & Präteritum', 'description' => 'Das Buch wird gelesen.'],
        ['title' => 'Plusquamperfekt', 'description' => 'Vorvergangenheit erklären।'],
        ['title' => 'Relativsätze mit Präpositionen', 'description' => 'auf den ich warte ইত্যাদি।'],
        ['title' => 'Konjunktion: obwohl, trotzdem', 'description' => 'বিপরীত ভাব।'],
        ['title' => 'Indirekte Rede', 'description' => 'Reported speech।'],
        ['title' => 'Nomen-Verb-Verbindungen', 'description' => 'einen Antrag stellen ইত্যাদি।'],
        ['title' => 'Partizip I & II als Adjektive', 'description' => 'geliebte Stadt ইত্যাদি।'],
        ['title' => 'Temporale Nebensätze', 'description' => 'als, während, nachdem ইত্যাদি।'],
        ['title' => 'Finale Nebensätze', 'description' => 'damit, um ... zu।'],
        ['title' => 'Kausale Nebensätze', 'description' => 'weil, da।'],
        ['title' => 'Konzessive Nebensätze', 'description' => 'obwohl, obgleich।'],
        ['title' => 'Verben mit Präpositionen', 'description' => 'sich freuen auf ইত্যাদি।'],
        ['title' => 'Adjektive mit Präpositionen', 'description' => 'stolz auf, interessiert an।'],
        ['title' => 'Redemittel für Diskussion', 'description' => 'মতামত দেওয়ার বাক্য।'],
        ['title' => 'Statistiken beschreiben', 'description' => 'গ্রাফ বিশ্লেষণ।'],
        ['title' => 'Lebenslauf schreiben', 'description' => 'CV লেখার নিয়ম।'],
        ['title' => 'Bewerbungsschreiben', 'description' => 'জব অ্যাপ্লিকেশন লেখা।'],
        ['title' => 'Arbeitswelt und Bewerbung', 'description' => 'চাকরির দুনিয়া।'],
        ['title' => 'Umwelt und Natur', 'description' => 'প্রাকৃতিক পরিবেশ।'],
        ['title' => 'Gesellschaft und Integration', 'description' => 'সমাজ ও সংহতি।'],
        ['title' => 'Gesundheit und Krankheiten', 'description' => 'স্বাস্থ্য।'],
        ['title' => 'Listening Practice', 'description' => 'শোনার দক্ষতা উন্নয়ন।'],
        ['title' => 'Speaking Practice & Mock Test', 'description' => 'মক টেস্ট ও কথাবার্তা।'],
    ],
    'ExamPreparation' => [
        ['title' => 'Hören Teil 1', 'description' => 'বিভিন্ন অডিও শ্রবণ ও উত্তর।'],
        ['title' => 'Hören Teil 2', 'description' => 'সংলাপ শ্রবণ অনুশীলন।'],
        ['title' => 'Hören Teil 3', 'description' => 'দীর্ঘ শ্রবণ পরীক্ষা অনুশীলন।'],
        ['title' => 'Lesen Teil 1', 'description' => 'সংক্ষিপ্ত লেখা বোঝা।'],
        ['title' => 'Lesen Teil 2', 'description' => 'মেইল/ঘোষণা পড়ে প্রশ্নের উত্তর।'],
        ['title' => 'Lesen Teil 3', 'description' => 'পত্রিকা ও পোস্ট বোঝা।'],
        ['title' => 'Lesen Teil 4', 'description' => 'মতামত বিশ্লেষণ।'],
        ['title' => 'Schreiben Teil 1', 'description' => 'ইমেল লেখা অনুশীলন।'],
        ['title' => 'Schreiben Teil 2', 'description' => 'মতামত সহকারে লেখা।'],
        ['title' => 'Sprechen Teil 1', 'description' => 'নিজেকে পরিচয় দেওয়া।'],
        ['title' => 'Sprechen Teil 2', 'description' => 'একটি বিষয় উপস্থাপন।'],
        ['title' => 'Sprechen Teil 3', 'description' => 'অন্যের সাথে আলোচনা।'],
        ['title' => 'Redemittel Einführung', 'description' => 'শুদ্ধ বাক্য গঠন।'],
        ['title' => 'Bildbeschreibung', 'description' => 'ছবি বর্ণনা অনুশীলন।'],
        ['title' => 'Meinung äußern', 'description' => 'নিজের মতামত প্রকাশ।'],
        ['title' => 'Diskussion führen', 'description' => 'তর্ক/আলোচনা অনুশীলন।'],
        ['title' => 'Grammatik Wiederholung', 'description' => 'পুরাতন grammar পুনরালোচনা।'],
        ['title' => 'Wortschatz Training', 'description' => 'শব্দভাণ্ডার অনুশীলন।'],
        ['title' => 'Tipps für Prüfung', 'description' => 'পরীক্ষার প্রস্তুতির কৌশল।'],
        ['title' => 'Probeprüfung 1', 'description' => 'পূর্ণ মক টেস্ট ১।'],
        ['title' => 'Probeprüfung 2', 'description' => 'পূর্ণ মক টেস্ট ২।'],
        ['title' => 'Fehleranalyse', 'description' => 'ভুল বিশ্লেষণ ও সংশোধন।'],
        ['title' => 'Motivation & Zielsetzung', 'description' => 'নিজেকে প্রস্তুত করা।'],
        ['title' => 'General Review & Q/A', 'description' => 'সার্বিক রিভিউ ও প্রশ্নোত্তর।'],
    ]
];


$titleText = $titles[$batchId] ?? 'কোর্স ডিটেলস পাওয়া যায়নি';
$descText = $descriptions[$batchId] ?? '';
$classDetails = $classList[$batchId] ?? [];
?>

<div class="app-main__outer">
    <div id="refreshData">
        <div class="app-main__inner">
            <div class="app-page-title">
                <div class="page-title-wrapper">
                    <div class="page-title-heading">
                        <div class="page-title-icon">
                            <i class="pe-7s-notebook icon-gradient bg-mean-fruit"></i>
                        </div>
                        <div><?php echo $titleText; ?></div>
                    </div>
                </div>
            </div>

            <?php if (!empty($descText)) { ?>
                <div class="main-card mb-3 card" style="background-color: #e8f0fe;">
                    <div class="card-body">
                        <p><?php echo $descText; ?></p>
                    </div>
                </div>
            <?php } ?>

            <?php foreach ($classDetails as $index => $class) { ?>
                <div class="main-card mb-3 card" style="background-color: #f0fff4;">
                    <div class="card-body">
                        <h5 class="card-title">Class <?php echo $index + 1; ?>: <?php echo $class['title']; ?></h5>
                        <p><?php echo $class['description']; ?></p>
                    </div>
                </div>
            <?php } ?>

        </div>
    </div>
</div>
