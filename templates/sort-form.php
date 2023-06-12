<div class="sort-form-container">
    <?php
    //überprüfen, ob die POST variable gesetzt wurde
    if(isset($_POST['submit'])){
        //wenn ein POST existiert, werden die Post variablen definiert
        $selected = $_POST['sort-by'];
        $orderBy = ' ORDER BY '.$selected;
        $searchStr = $_POST['searchStr'];

    }else{
        $selected='';
        $orderBy = '';
        $searchStr ='';
    }
    ?>
    <form method="post" action="">
        <div class="select-container">
            <select name="sort-by" id="sort-by">
                <?php
                echo '<option value="', $rowsFilterable[0][0].'.'.$rowsFilterable[0][1] ,'">Sortierung wählen</option>';//placehoder für empty
                foreach ($rowsFilterable as $name) {
                    if($name[1] == $selected){
                        echo '<option value="', $name[0].'.'.$name[1] ,'" selected="selected">', $name[2], '</option>';
                    }else{
                        echo '<option value="', $name[0].'.'.$name[1] ,'">', $name[2], '</option>';
                    }

                }
                ?>
            </select>

        </div>
        <input type="text" id="searchStr" name="searchStr" value="" placeholder="Suche" class="searchbar">
        <input type="submit" value="Filter anwenden" name="submit" class="submit-button">
    </form>

</div>