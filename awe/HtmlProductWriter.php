<?php


namespace awe;


class HtmlProductWriter extends ShopProductWriter
{

    public function write()
    {
        echo $this->htmlHeader();
        echo $this->htmlBody();
        echo '</html>';
    }

    private function htmlHeader()
    {
        return
            '<!DOCTYPE html>
            <html>
            <head>
                <title>AWE Product List</title>
                <link rel="stylesheet" href="./css/styles.css">
            </head>';
    }

    private function htmlBody()
    {
        $bookproducts = [];
        $cdproducts = [];
        $gameproducts = [];
        foreach ($this->products as $product) {
            if($product instanceof BookProduct) $bookproducts[] = $product;
            if($product instanceof CdProduct) $cdproducts[] = $product;
            if($product instanceof GameProduct) $gameproducts[] = $product;
           }
   
           $booktable = $this->generateBookTable($bookproducts);
           $cdtable = $this->generateCdTable($cdproducts);
           $gametable   = $this->generateGameTable($gameproducts);
   
           $addProduct = $this->generateAddProductForm();

        return
            '<body>'
            . $booktable .
            '<br />'
            .$cdtable.
            '<br />'
            .$gametable.
            '<br />'
            .$addProduct .
            '</body>';
    }

    private function generateBookTable($bookproducts)
    {
        $contents = '';
        foreach ($bookproducts as $book) {
            $contents .= '<tr>
                  <td>'.$book->getFullName().'</td>'
                .'<td>'.$book->getTitle().'</td>'
                .'<td>'.$book->getNumberOfPages().'</td>'
                .'<td>'.$book->getPrice().'</td>'
                .'<td>'.'<a href="./index.php?delete='.$book->getId().'">X</a>'.'</td>
                </tr>';
        }
        return
            '
            <h3>BOOKS</h3>
            <table class="paleBlueRows equal-width">
                <thead>
                    <tr>
                        <th>AUTHOR</th>
                        <th>TITLE</th>
                        <th>PAGES</th>
                        <th>PRICE</th>
                        <th>DELETE</th>
                    </tr>
                    </thead>
                    <tbody>'
            .$contents.
                '</tbody>
            </table>';
    }

    private function generateCdTable($cdproducts)
    {
        $contents = '';
        foreach ($cdproducts as $cd) {
            $contents .= '<tr>
                  <td>'.$cd->getFullName().'</td>'
                .'<td>'.$cd->getTitle().'</td>'
                .'<td>'.$cd->getPlayLength().'</td>'
                .'<td>'.$cd->getPrice().'</td>'
                .'<td>'.'<a href="./index.php?delete='.$cd->getId().'">X</a>'.'</td>
                </tr>';
        }
        return
            '
            <h3>CDs</h3>
            <table class="paleBlueRows equal-width">
                 <thead>
                    <tr>                    
                        <th>ARTIST</th>
                        <th>TITLE</th>
                        <th>DURATION</th>
                        <th>PRICE</th>
                        <th>DELETE</th>
                    </tr>
                    </thead>
                    <tbody>'
            .$contents.
            '</tbody>
            </table>';
    }


    private function generateGameTable($gameproducts)
    {
        $contents = '';
        foreach ($gameproducts as $game) {
            $contents .= '<tr>
                  <td>'.$game->getFullName().'</td>'
                .'<td>'.$game->getTitle().'</td>'
                .'<td>'.$game->getNumberOfPegis().'</td>'
                .'<td>'.$game->getPrice().'</td>'
                .'<td>'.'<a href="./index.php?delete='.$game->getId().'">X</a>'.'</td>
                </tr>';
        }
        return
            '
            <h3>GAMES</h3>
            <table class="paleBlueRows equal-width">
                <thead>
                    <tr>
                        <th>CONSOLE</th>
                        <th>TITLE</th>
                        <th>PEGI</th>
                        <th>PRICE</th>
                        <th>DELETE</th>
                    </tr>
                    </thead>
                    <tbody>'
            .$contents.
                '</tbody>
            </table>';
    }
    private function generateAddProductForm()
    {
        return '
          <hr />
          <h2>ADD NEW PRODUCT</h2>
         <form action="./index.php" method="post">
          <label for="producttype">Product Type:</label>
          <select id="producttype" name="producttype">
                <option value="hidden" style="display:none;">Select</option>  
                <option value="book">Book</option>
                <option value="cd">CD</option>
                <option value="game">Game</option>
          </select> 
          <br />
          <br />
        <div class="ffor">
          <div id="cdForm" style="display:none">
          <label for="cd_fname" style="font-size:20px;"><b>Artist</b></label>
          <br />
          <label for="cd_fname">First Name:</label>
          <input type="text" id="cd_fname" name="fname"><br />
          <br />
          <label for="cd_sname">Last Name:</label>
          <input type="text" id="cd_sname" name="sname">
          <br />
          <br />
          <label for="cd_title">Title:</label>
          <input type="text" id="cd_title" name="title">
          <br />
          <br />
          <label for="cd_pages">Duration</label>
          <input type="text" id="cd_pages" name="pages">
          <br />
          <br />
          <label for="cd_price">Price:</label>
          <input type="text" id="cd_price" name="price">
          <br />
          <br />
      </div>
      
      <div id="bookForm" style="display:none">
          <label for="book_fname" style="font-size:20px;"><b>Author</b></label>
          <br />
          <label for="book_fname">First Name:</label>
          <input type="text" id="book_fname" name="fname"><br />
          <br />
          <label for="book_sname">Last Name:</label>
          <input type="text" id="book_sname" name="sname">
          <br />
          <br />
          <label for="book_title">Title:</label>
          <input type="text" id="book_title" name="title">
          <br />
          <br />
          <label for="book_pages">Pages:</label>
          <input type="text" id="book_pages" name="pages">
          <br />
          <br />
          <label for="book_price">Price:</label>
          <input type="text" id="book_price" name="price">
          <br />
          <br />
      </div>
      
      <div id="gameForm" style="display:none">
          <label for="game_fname" style="font-size:20px;"><b>Author</b></label>
          <br />
          <label for="game_fname">First Name:</label>
          <input type="text" id="game_fname" name="fname"><br />
          <br />
          <label for="game_sname">Last Name:</label>
          <input type="text" id="game_sname" name="sname">
          <br />
          <br />
          <label for="game_title">Title:</label>
          <input type="text" id="game_title" name="title">
          <br />
          <br />
          <label for="game_pages">PEGI:</label>
          <input type="text" id="game_pages" name="pages">
          <br />
          <br />
          <label for="game_price">Price:</label>
          <input type="text" id="game_price" name="price">
          <br />
          <br />
      </div>
      
        <input type="submit" value="Submit">
        </form> 
<div/>
<script>
document.getElementById("producttype").addEventListener("change", showCategoryForm);

function showCategoryForm() {
    var selectedOption = document.getElementById("producttype").value;
    document.getElementById("cdForm").style.display = "none"; //hides the form inititally
    document.getElementById("bookForm").style.display = "none";
    document.getElementById("gameForm").style.display = "none";

    // Show the selected form
    if (selectedOption === "cd") {
        document.getElementById("cdForm").style.display = "block";
    } else if (selectedOption === "book") {
        document.getElementById("bookForm").style.display = "block";
    } else if (selectedOption === "game") {
        document.getElementById("gameForm").style.display = "block";
    }
}
</script   
';}}
