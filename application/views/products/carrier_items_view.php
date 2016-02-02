<div class="table-responsive">
    <table class="table table-striped table-bordered table-hover">
        <thead>
        <tr role="row" class="heading">
            <th>id</th>
            <th>is present</th>
            <th>shipment_id</th>
            <th>item_id</th>
            <th>tracking_id</th>
            <th>carrier_id</th>
            <th>customer_id</th>
            <th>customer</th>
            <th>location</th>
            <th>created_on</th>
            <th>type</th>
            <th>status</th>
            <th>give</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach($carrier_items as $item):?>
            <tr>
                <td><?=$item['id']?></td>
                <td><?=$item['is_present'] ? 'yes' : 'no'?></td>
                <td><?=$item['shipment_id']?></td>
                <td><?=$item['item_id']?></td>
                <td><?=$item['tracking_id']?></td>
                <td><?=$item['carrier_id']?></td>
                <td><?=$item['customer_id']?></td>
                <td><?=$item['name'],'<br />',$item['address']?></td>
                <td><?=$item['location']?></td>
                <td><?=$item['created_on']?></td>
                <td><?=$types[$item['type']]?></td>
                <td><?=$statuses[$item['status']]?></td>
                <td><input type="checkbox" class="carrier_items_check" value="<?=$item['id']?>" name="items[]" /></td>
            </tr>
        <?php endforeach?>
        </tbody>
    </table>
</div>
