<?php
include('../../connection/config.php');
// Function to extract URLs from sitemap.xml
function fetchPageURLs($url)
{
    $xml = simplexml_load_file($url);
    $urls = array();

    foreach ($xml->url as $url) {
        $urls[] = (string)$url->loc;
    }

    return $urls;
}


// Fetch the URLs from the sitemap.xml
$sitemapURL = 'sitemap.xml'; // Replace with the actual sitemap URL
$pageURLs = fetchPageURLs($sitemapURL);

// Filter out duplicate URLs from the database
$filteredURLs = array();
foreach ($pageURLs as $url) {
    $query = "SELECT COUNT(*) as count FROM website_pages WHERE page_url = '$url'";
    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_assoc($result);
    if ($row['count'] == 0) {
        $filteredURLs[] = $url;
    }
}

// Save filtered URLs into the database
if (!empty($filteredURLs)) {
    $query = "INSERT INTO website_pages (page_url) VALUES ";
    $values = array_map(function ($url) {
        return "('$url')";
    }, $filteredURLs);
    $query .= implode(",", $values);

    $inpurl = mysqli_query($con, $query);

    if ($inpurl) {
        $data['status'] = true;
        $data['message'] = 'Pages Fetched Successfully..';
    } else {
        $data['status'] = false;
        $data['message'] = 'Error Occur in Pages Fetching..';
    }
}


echo json_encode($data);