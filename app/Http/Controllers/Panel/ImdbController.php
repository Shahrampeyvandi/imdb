<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ImdbController extends Controller
{
    public function getmoviedetail(Request $request)
    {
        $code = 'tt5700672';
        $ch = curl_init('http://www.omdbapi.com/?apikey=c6562931&i=' . $code);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json'
        ));
        $result = curl_exec($ch);
        $err = curl_error($ch);
        $result = json_decode($result, true);
        curl_close($ch);
        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
        }

        dd($result);   
        
        $title=$result['Title'];
        $Year=$result['Year'];// like 2007-2012
        $Rated=$result['Rated'];//TV-14
        $Released=$result['Released']; // like 29 Aug 2005
        $Runtime=$result['Runtime'];// like 44 min
        $Genre=$result['Genre'];//Action, Crime, Drama, Mystery, Thriller
        $Director=$result['Director'];
        $Writer=$result['Writer'];//Paul Scheuring
        $Actors=$result['Actors'];//Dominic Purcell, Wentworth Miller, Robert Knepper, Amaury Nolasco
        $Plot=$result['Plot'];//
        $Language=$result['Language'];//English, Arabic, Spanish
        $Country=$result['Country'];//UK, USA
        $Awards=$result['Awards'];//Nominated for 2 Golden Globes. Another 8 wins & 30 nominations.
        $Poster=$result['Poster'];//https://m.media-amazon.com/images/M/MV5BMTg3NTkwNzAxOF5BMl5BanBnXkFtZTcwMjM1NjI5MQ@@._V1_SX300.jpg
        $Ratings=$result['Ratings'][0]['Value'];//8.3/10
        $imdbRating=$result['imdbRating'];//8.3
        $imdbVotes=$result['imdbVotes'];//458,117
        $imdbID=$result['imdbID'];//imdbID
        $Type=$result['Type'];//series
        $totalSeasons=$result['totalSeasons'];//5
        $BoxOffice=$result['BoxOffice'];//$2,129,768
        $title=$result['Title'];

    }
}
