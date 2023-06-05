<div class="sort-form-container">
    <?php
    //überprüfen, ob die POST variable gesetzt wurde
    if(isset($_POST['submit'])){
        //wenn ein POST existiert, werden die Post variablen definiert
        $selected = $_POST['sort-by'];
        $orderBy = ' ORDER BY '.$selected;
        if(!in_array($selected,$rowsFilterable)){//überprüfung, ob POST variablen valide sind
            $selected='';
            $orderBy = '';
        }
    }else{
        $selected='';
        $orderBy = '';
    }
    ?>
    <form method="post" action="">
        <div class="select-container">
            <select name="sort-by" id="sort-by">
                <?php
                echo '<option value="', $rowsFilterable[0] ,'">Filter wählen</option>';
                foreach ($rowsFilterable as $name) {
                    if($name == $selected){
                        echo '<option value="', $name ,'" selected="selected">', $name, '</option>';
                    }else{
                        echo '<option value="', $name ,'">', $name, '</option>';
                    }

                }
                ?>
            </select>
        </div>
        <input type="submit" value="Filter" name="submit" class="submit-button">
    </form>

</div>