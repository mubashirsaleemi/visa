<script type="text/javascript">
function del_q(id) {
    cnfr = confirm("Wait a min. Are you really going to delete the Shipment with id:" + id);
    if (cnfr) {
        document.location = "<?=BASEURL?>admin/delete-shipment?id="+id;
    }
}
</script>

<div class="page animsition">
    <div class="page-header">
        <h1 class="page-title" style="text-transform: capitalize;"><?=$page_title?></h1>
        <ol class="breadcrumb">
            <li><a href="<?=BASEURL?>admin">Admin</a></li>
            <li><?=$page_title?></li>
        </ol>
        <div class="page-header-actions">
            <a class="btn btn-sm btn-primary btn-round" href="<?=BASEURL?>" target="_blank">
                <i class="icon md-link" aria-hidden="true"></i>
                <span class="hidden-xs">Website</span>
            </a>
        </div><!-- /page-header-actions -->
    </div><!-- /page-header -->
    <?php if ($msg_code): ?>
    <div class="bg-success well">
        <p><?=$msg_code?></p>
    </div>
    <?php endif;?>
    <div class="page-content">
        <div class="panel">
            <header class="panel-heading">
                <div class="panel-actions"></div>
                <h3 class="panel-title">Data</h3>
            </header>
            <div class="panel-body">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="margin-bottom-15">
                            <button id="addToTable" class="btn btn-primary" type="button" onClick="document.location='<?=BASEURL?>admin/add-shipment';">
                                <i class="icon md-plus" aria-hidden="true"></i> Add Shipment
                            </button>
                        </div><!-- /margin-bottom-15 -->
                    </div><!-- /6 -->
                </div><!-- /row -->
                <table class="table table-bordered table-hover dataTable table-striped width-full" data-plugin="dataTable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Tracking Id</th>
                            <th>Reference No</th>
                            <th>Customer</th>
                            <th>Detail</th>
                            <th>Time Line</th>
                            <th>Shipment Status</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Tracking Id</th>
                            <th>Reference No</th>
                            <th>Customer</th>
                            <th>Detail</th>
                            <th>Time Line</th>
                            <th>Shipment Status</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                        if (count($shipments) > 0) {
                            foreach ($shipments as $q): ?>
                                <tr>
                                    <td><?=$q['shipment_id']?></td>
                                    <td><?=$q['tracking_id']?></td>
                                    <td><?=$q['carrier_reference_no']?></td>
                                    <td>
                                        <h3>Customer</h3>
                                        <table class="table table-bordered">
                                            <tr>
                                                <td>Name</td>
                                                <td><?=$q['cutomer_name']?></td>
                                            </tr>
                                            <tr>
                                                <td>Phone</td>
                                                <td><?=$q['cutomer_phone']?></td>
                                            </tr>
                                            <tr>
                                                <td>Email</td>
                                                <td><?=$q['cutomer_email']?></td>
                                            </tr>
                                        </table>
                                        <hr>
                                        <h3>Shipper</h3>
                                        <table class="table table-bordered">
                                            <tr>
                                                <td>Name</td>
                                                <td><?=$q['shipper_name']?></td>
                                            </tr>
                                            <tr>
                                                <td>Address</td>
                                                <td><?=$q['shipper_address']?></td>
                                            </tr>
                                            <tr>
                                                <td>City</td>
                                                <td><?=$q['shipper_city']?></td>
                                            </tr>
                                            <tr>
                                                <td>Phone</td>
                                                <td><?=$q['shipper_phone']?></td>
                                            </tr>
                                            <tr>
                                                <td>Email</td>
                                                <td><?=$q['shipper_email']?></td>
                                            </tr>
                                        </table>
                                        <hr>
                                        <h3>Receiver</h3>
                                        <table class="table table-bordered">
                                            <tr>
                                                <td>Name</td>
                                                <td><?=$q['receiver_name']?></td>
                                            </tr>
                                            <tr>
                                                <td>Address</td>
                                                <td><?=$q['receiver_address']?></td>
                                            </tr>
                                            <tr>
                                                <td>City</td>
                                                <td><?=$q['receiver_city']?></td>
                                            </tr>
                                            <tr>
                                                <td>Phone</td>
                                                <td><?=$q['receiver_phone']?></td>
                                            </tr>
                                            <tr>
                                                <td>Email</td>
                                                <td><?=$q['receiver_email']?></td>
                                            </tr>
                                        </table>
                                    </td>
                                    <td>
                                        <table class="table table-bordered">
                                            <tr>
                                                <td>Origin</td>
                                                <td><?=$q['origin']?></td>
                                            </tr>
                                            <tr>
                                                <td>Destination</td>
                                                <td><?=$q['destination']?></td>
                                            </tr>
                                            <tr>
                                                <td>Weight</td>
                                                <td><?=$q['weight']?></td>
                                            </tr>
                                            <tr>
                                                <td>Product</td>
                                                <td><?=$q['product']?></td>
                                            </tr>
                                            <tr>
                                                <td>Total Freight</td>
                                                <td><?=$q['total_freight']?></td>
                                            </tr>
                                            <tr>
                                                <td>Pick Up Date</td>
                                                <td><?=$q['pick_up_date']?></td>
                                            </tr>
                                            <tr>
                                                <td>Pick Up Time</td>
                                                <td><?=$q['pick_up_time']?></td>
                                            </tr>
                                            <tr>
                                                <td>Comments</td>
                                                <td><?=$q['comments']?></td>
                                            </tr>
                                            <tr>
                                                <td>Package</td>
                                                <td><?=$q['package']?></td>
                                            </tr>
                                            <tr>
                                                <td>Carrier</td>
                                                <td><?=$q['carrier']?></td>
                                            </tr>
                                            <tr>
                                                <td>Shipment Mode</td>
                                                <td><?=$q['shipment_mode']?></td>
                                            </tr>
                                            <tr>
                                                <td>Expected Delivery Date</td>
                                                <td><?=$q['expected_delivery_date']?></td>
                                            </tr>
                                            <tr>
                                                <td>Departure Time</td>
                                                <td><?=$q['departure_time']?></td>
                                            </tr>
                                            <tr>
                                                <td>Type Of Shipment</td>
                                                <td><?=$q['type_of_shipment']?></td>
                                            </tr>
                                            <tr>
                                                <td>Payment Mode</td>
                                                <td><?=$q['payment_mode']?></td>
                                            </tr>
                                        </table>
                                    </td>
                                    <td><a href="javascript://" class="btn btn-sm btn-icon btn-pure btn-default on-default remove-row get-timeline" data-id="<?=$q['shipment_id']?>" data-ref="<?=$q['carrier_reference_no']?>"><i class="icon md-eye" aria-hidden="true"></i></a></td>
                                    <td><?=$q['shipment_status']?></td>
                                    <td>
                                        <?=$q['status']?>
                                        <select name="status" data-id="<?=$q['shipment_id']?>" class="form-control">
                                            <option value="">Change Status</option>
                                            <option value="active">Active</option>
                                            <option value="inactive">Inactive</option>
                                        </select>
                                    </td>
                                    <td class="actions">
                                        <a href="<?=BASEURL?>admin/edit-shipment?id=<?=$q['shipment_id']?>" class="btn btn-sm btn-icon btn-pure btn-default on-default edit-row" data-toggle="tooltip" data-original-title="Edit"><i class="icon md-edit" aria-hidden="true"></i></a> &nbsp;&nbsp;
                                        <a href="javascript:del_q('<?=$q['shipment_id']?>')" class="btn btn-sm btn-icon btn-pure btn-default on-default remove-row" data-toggle="tooltip" data-original-title="Remove"><i class="icon md-delete" aria-hidden="true"></i></a>
                                    </td>
                                </tr>
                                <?php endforeach;
                        } //end if
                        else {
                            ?>
                            <tr>
                                <td>
                                    No shipment found in the database
                                </td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <?php
                        }?>
                    </tbody>
                </table>
            </div><!-- /panel-body -->
        </div><!-- /panel -->
      <!-- End Panel Basic -->
    </div><!-- /page-content -->
</div><!-- /page/animsition -->



<script>
$(function(){
    $(document).on('change', 'select[name="status"]', function(event) {
        event.preventDefault();
        $this = $(this);
        $id = $this.attr('data-id');
        $status = $this.val();
        $.post('<?=BASEURL."admin/change-shipment-status"?>', {status: $status, id: $id}, function(resp) {
            resp = JSON.parse(resp);
            alert(resp.msg);
            location.reload();
        });
    });
    $(document).on('click', '.get-timeline', function(event) {
        event.preventDefault();
        $this = $(this);
        $id = $this.attr('data-id');
        $ref = $this.attr('data-ref');
        $(".theatre-cover").fadeIn(100);
        $.post('<?=BASEURL."admin/get-timeline"?>', {id: $id}, function(resp) {
            resp = JSON.parse(resp);
            console.log(resp);
            $(".theatre-cover").fadeOut(100);
            $("#modal-timeline .modal-title").text($id+' ('+$ref+')');
            $("#modal-timeline input[name='shipment_id']").val($id);
            $("#modal-timeline table tbody").html(resp.html);
            $("#modal-timeline").modal('show');
        });
    });
    $(document).on('submit', '#timeline-form', function(event) {
        event.preventDefault();
        $form = $(this);
        $(".theatre-cover").fadeIn(100);
        $.post('<?=BASEURL."admin/post-timeline"?>', {data: $form.serialize()}, function(resp) {
            resp = $.parseJSON(resp);
            $(".theatre-cover").fadeOut(100);
            if (resp.status == true) {
                $("#modal-timeline table tbody").html(resp.html);
            }
            alert(resp.msg);
        });
    });
    $(document).on('click', '.delete-time-line', function(event) {
        event.preventDefault();
        $this = $(this);
        $id = $this.attr('data-id');
        $.post('<?=BASEURL."admin/delete-timeline"?>', {id: $id}, function(resp) {
            resp = $.parseJSON(resp);
            $(".theatre-cover").fadeOut(100);
            if (resp.status == true) {
                $this.parent('td').parent('tr').remove();
            }
            else{
                alert(resp.msg);
            }
        });
    });
});
</script>


<div class="modal fade" id="modal-timeline">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Modal title</h4>
            </div>
            <div class="modal-body">
                
                <table class="table table-bordered table-striped">
                    <thead>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Location</th>
                        <th>Activity</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><a href="javascript://" class="btn btn-sm btn-icon btn-pure btn-default on-default remove-row delete-time-line" data-id="<?=$q['shipment_id']?>"><i class="icon md-delete" aria-hidden="true"></i></a></td>
                        </tr>
                    </tbody>
                </table>

                <form id="timeline-form">
                    <h3>Add Time Line</h3>
                    <input type="hidden" name="shipment_id">
                    <div class="form-group">
                        <label>Date</label>
                        <input type="date" name="date" class="form-control" required>
                    </div><!-- /form-group -->
                    <div class="form-group">
                        <label>Time</label>
                        <input type="time" name="time" class="form-control" required>
                    </div><!-- /form-group -->
                    <div class="form-group">
                        <label>Location/Supplied via</label>
                        <input type="text" name="location" class="form-control" required>
                    </div><!-- /form-group -->
                    <div class="form-group">
                        <label>Activity</label>
                        <select name="activity" class="form-control" required>
                            <option value="">Select Activity</option>
                            <option value="Shipment Finalised">Shipment Finalised</option>
                            <option value="In Transit To Destination">In Transit To Destination</option>
                            <option value="Arrived Hub">Arrived Hub</option>
                            <option value="In Transit Delay">In Transit Delay</option>
                            <option value="Add Shipment">Add Shipment</option>
                        </select>
                    </div><!-- /form-group -->
                    <button type="submit" class="btn btn-primary">S A V E</button>
                </form>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div><!-- /modal-content -->
    </div><!-- /modal-dialog -->
</div><!-- #modal-timeline -->
