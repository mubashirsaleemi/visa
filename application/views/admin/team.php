<script type="text/javascript">
    function del_q(id) {
        cnfr = confirm("Are you sure you want to delete this Team");
        if (cnfr) {
            document.location = "<?=BASEURL?>admin/delete-Team/?id=" + id;
        }
    }
</script>
<div class="page animsition">
    <div class="page-header">
        <h1 class="page-title"><?=$page_title?></h1>
        <ol class="breadcrumb">
            <li><a href="<?=BASEURL?>admin">Admin</a></li>
            <li><?=$page_title?></li>
        </ol>
        <div class="page-header-actions">
            <a class="btn btn-sm btn-success btn-round" href='<?=BASEURL."admin/add-team"?>'>
                <i class="icon md-plus" aria-hidden="true"></i>
                <span class="hidden-xs">Add Team</span>
            </a>

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
                <table class="table table-bordered table-hover dataTable table-striped width-full" data-plugin="dataTable">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Position</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Name</th>
                            <th>Position</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                        if (count($team) > 0) {
                            foreach ($team as $q): ?>
                                <tr>
                                    <td><?=$q['name']?></td>
                                    <td><?=$q['position']?></td>
                                    <td><img src="<?=UPLOADS.$q['image']?>" width="150"></td>
                                    <td class="actions">
                                        <a href="javascript:del_q('<?=$q['team_id']?>')" class="btn btn-sm btn-icon btn-pure btn-default on-default remove-row"><i class="icon md-delete" aria-hidden="true"></i></a>
                                        <a href="<?=BASEURL.'admin/edit-team?id='.$q['team_id'].'/'?>" class="btn btn-sm btn-icon btn-pure btn-default on-default edit-row"><i class="icon md-edit" aria-hidden="true"></i></a>
                                    </td>
                                </tr>
                                <?php endforeach;
                        } //end if
                        else {
                            ?>
                            <tr>
                                <td>
                                    No Team found.
                                </td>
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