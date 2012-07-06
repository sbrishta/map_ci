

<?php foreach ($file_data as $row): ?>
    <fieldset>
        <legend>Each location INFO</legend>  
        <?php echo form_open('mainhome/'); ?> 

        <label for="bank_name">Bank Name </label><?php echo form_input('bank_name', set_value('bank_name', $row['bank_name'])); ?>
        <label for="area_name">Area Name </label><?php echo form_input('area_name', set_value('area_name', $row['area_name'])); ?>
        <label for="address">Address </label><?php
    echo form_input('address', set_value('address', $row['address']));
        ?>
        <label for="type">Select type</label>
        <select name="type">
            <option>ATM booth</option>
            <option>Branch office</option>
            <option>Head office</option>

        </select><br/>
        <label>Map</label>
        <?php
        $addStr['add'] = $row['address'] . $row['area_name'] . "bangladesh";
        $this->load->view('newExp2', $addStr);

        echo form_submit('submit', 'Save');
        echo form_close();
        ?>
    </fieldset>
<?php endforeach; ?>
<?php
$this->load->view('home/footer');
?>