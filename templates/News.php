<?php
class news
{
    /**
     * Pass in an array of stories to render
     *
     * @param $data
     */
    public static function stories($data)
    {
        foreach ( $data as $story ) {
            Self::story($story);
        }
    }
    /**
     * Render a single story
     *
     * @param $data
     */
    public static function story($data)
    {
        $title = $data['title'];
        $content = $data['content'];
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $email = $_POST['email'];
        // $author = $data['firstname'] . ' ' . $data['lastname'];
        echo <<<story
        <div class="top10">
            <h2>$title</h2>
            <h5>Display from  sometime until some other time</h5>
            <p>$content</p>
        </div>    
        
        <div class="top10">
            <h2>$firstName</h2>
            <h2>$lastName</h2>
            <h2>$email</h2>
        </div>
story;
        // second table for login page
    }
    /**
     * Create the header to a table using the column names as the
     * titles of the column
     * @param $data
     * @return string
     */
    public static function buildTableHeader($data)
    {
        // Start building the table
        $table = '<table class="table table-hover">';
        // Create the table header row
        $header = '<tr>';
        if (is_array($data)) {
            foreach ($data[0] as $key => $cell) {
                $header .= '<th>' . $key . '</th>';
            }
        }
        $header .= '</tr>';
        // Add the header to the table
        $table .= $header;
        return $table;
    }
    /**
     * Close out the table
     * @return string
     */
    public static function closeTable()
    {
        // Close out the table
        $table = '</table>';
        return $table;
    }
    /**
     * Loop through a data row and create the table cells
     * @param $row
     * @return string
     */
    public static function buildTableRow($row)
    {
        // Loop through each cell to build a row of data
        $rowHTML = '<tr>';
        // Loop through each cell and create the cells
        foreach ( $row as $cell ) {
            $rowHTML .= '<td>' . $cell . '</td>';
        }
        $rowHTML .= '<td><a href="/updatePost.php? id=4">' . 'update' . '</a></td>';
        $rowHTML .= '<td><a href="/deletePost.php? id=1">' . 'delete' . '</a></td>';
        $rowHTML .= '<td><a href="/viewPost.php? id=4">' . 'view' . '</a></td>';
        $rowHTML .= '</tr>';
        return $rowHTML;
    }
}