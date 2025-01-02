<?php
        function callApi($url, $method = 'GET', $data = null) {
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            if (in_array($method, ['POST', 'PUT', 'DELETE'])) {
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
                curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
                if ($data) {
                    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
                }
            }
            $response = curl_exec($ch);
            if (curl_errno($ch)) {
                die('cURL Error: ' . curl_error($ch));
            }
            curl_close($ch);
            return json_decode($response, true);
        }
?>