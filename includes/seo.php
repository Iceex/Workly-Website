<?php

$siteUrl = 'https://worklystaff.com';
$logoUrl = $siteUrl . '/assets/logo.png';

$pageTitle = $pageTitle ?? 'Workly – Elite Virtual Assistant Talent Platform';

$pageDescription = $pageDescription ?? 'Connect with highly skilled bilingual virtual assistants delivering tailored expertise across multiple industries and business functions.';
$organizationDescription = 'Workly connects businesses with highly skilled virtual assistants across multiple industries and business functions.';
$canonicalUrl = $canonicalUrl ?? $siteUrl . '/';
$ogImage = $ogImage ?? $logoUrl;

$robots = $robots ?? 'index, follow';

$escape = static fn($value) => htmlspecialchars(
    (string) $value,
    ENT_QUOTES | ENT_SUBSTITUTE,
    'UTF-8'
);

$organizationSchema = [
    '@context' => 'https://schema.org',
    '@type' => 'Organization',
    'name' => 'Workly',
    'url' => $siteUrl . '/',
    'description' => $organizationDescription,
    'logo' => $logoUrl,
];

?>

<title><?= $escape($pageTitle) ?></title>

<meta name="description" content="<?= $escape($pageDescription) ?>">
<meta name="robots" content="<?= $escape($robots) ?>">

<link rel="canonical" href="<?= $escape($canonicalUrl) ?>">

<!-- Open Graph -->
<meta property="og:type" content="website">
<meta property="og:site_name" content="Workly">
<meta property="og:title" content="<?= $escape($pageTitle) ?>">
<meta property="og:description" content="<?= $escape($pageDescription) ?>">
<meta property="og:url" content="<?= $escape($canonicalUrl) ?>">
<meta property="og:image" content="<?= $escape($ogImage) ?>">
<meta property="og:image:secure_url" content="<?= $escape($ogImage) ?>">
<meta property="og:image:type" content="image/png">
<meta property="og:image:alt" content="Workly - Virtual Assistant Platform">

<!-- Twitter -->
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="<?= $escape($pageTitle) ?>">
<meta name="twitter:description" content="<?= $escape($pageDescription) ?>">
<meta name="twitter:image" content="<?= $escape($ogImage) ?>">

<!-- Schema.org -->
<script type="application/ld+json">
<?= json_encode(
    $organizationSchema,
    JSON_UNESCAPED_SLASHES |
    JSON_UNESCAPED_UNICODE |
    JSON_HEX_TAG |
    JSON_HEX_AMP |
    JSON_HEX_APOS |
    JSON_HEX_QUOT
) ?>
</script>
