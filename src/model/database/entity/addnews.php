<?php

$curl = curl_init();

curl_setopt_array($curl, [
	CURLOPT_URL => "https://new-videogames-releases.p.rapidapi.com/getMonthGames",
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_ENCODING => "",
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 30,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => "GET",
	CURLOPT_HTTPHEADER => [
		"X-RapidAPI-Host: new-videogames-releases.p.rapidapi.com",
		"X-RapidAPI-Key: 6a177b62f8mshaa1338f3efd9bd8p1ee197jsne57229ef1e88"
	],
]);


$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
    echo "cURL Error: $err";
} else {
    $data = json_decode($response, true);

    // Check if the response is valid
    if ($data && isset($data['articles'])) {
        $articles = $data['articles'];

        try {
            $pdo = new PDO("mysql:host=127.0.0.1;dbname=Gamescore", "root", "");

            foreach ($articles as $article) {
                $stmt = $pdo->prepare("INSERT INTO news (title, author, publishDate, content, image, url) VALUES (?, ?, ?, ?, ?, ?)");
                $stmt->execute([
                    $article['title'] ?? null,
                    $article['author'] ?? null,
                    $article['publishDate'] ?? null,
                    $article['content'] ?? null,
                    $article['image'] ?? null,
                    $article['url'] ?? null,
                    $article['source'] ?? null,
                    $article['address'] ?? null
                ]);
            }

            echo "Data inserted into database successfully.";
        } catch (PDOException $e) {
            echo "Database Error: " . $e->getMessage();
        }
    } else {
        echo "Invalid API response.";
    }
}
?>
