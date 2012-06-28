
<table cellpadding="0" cellspacing="0">  
    <thead>  
    <th>  
            <td>ID</td>  
            <td>lon</td>  
            <td>lat</td>  
            
    </th>  
    </thead>  
  
    <tbody>  
            <?php foreach($csvData as $field){?>  
                <tr>  
                    <td><?=$field['r_id']?></td>  
                   <td><?=$field['lon']?></td>  
                    <td><?=$field['lat']?></td>  
                      
                </tr>  
            <?php }?>  
    </tbody>  
  
</table>  