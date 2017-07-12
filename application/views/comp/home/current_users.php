<script type="text/javascript">
    jQuery(document).ready(function() {
        jQuery('#selecctall').click(function(event) {  //on click
            if (this.checked) { // check select status
                jQuery('.checkbox1').each(function() { //loop through each checkbox
                    this.checked = true;  //select all checkboxes with class "checkbox1"              
                });
            } else {
                jQuery('.checkbox1').each(function() { //loop through each checkbox
                    this.checked = false; //deselect all checkboxes with class "checkbox1"                      
                });
            }
        });

    });

    function delete_user(user_id)
    {
        var ans = confirm("Are you sure to delete this user ?");
        if (ans)
        {
            window.location.href = "<?php echo base_url(SiteConfig::CONTROLLER_HOME . SiteConfig::METHOD_HOME_DELETE) . '/'; ?>" + user_id + "/" + "2.php";
        }
    }

    function select_state(state)
    {
        //alert(state);
        if (state == 'all')
        {
            window.location.href = "<?php echo site_url(SiteConfig::CONTROLLER_HOME . SiteConfig::METHOD_HOME_CURRENT_USERS); ?>";
        }
        else
        {
            window.location.href = "<?php echo base_url(SiteConfig::CONTROLLER_HOME . SiteConfig::METHOD_HOME_CURRENT_USERS); ?>" + "/" + state + '.php';
        }
    }
</script>

<div class="panel panel-primary">

    <div class="panel-heading">
        <h3 class="panel-title">Current Users</h3>
    </div>

    <div class="panel-body">

        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title" id="myModalLabel">Add New Customer</h4>
                    </div>
                    <div class="modal-body">
                        <form role="form" action="<?php echo site_url(SiteConfig::CONTROLLER_HOME . SiteConfig::METHOD_HOME_ADD); ?>" method="POST">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Name</label>
                                <input maxlength="32" minlength="5" name="<?php echo DBConfig::ATT_USERS_NAME; ?>" required type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter name"/>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">State</label>
                                <input name="<?php echo DBConfig::ATT_USERS_STATE; ?>" required type="text" class="form-control" id="exampleInputPassword1" placeholder="Enter state"/>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Select Type</label>
                                <select name="<?php echo DBConfig::ATT_USERS_USER_TYPE; ?>" required class="form-control">
                                    <option value="">Please Select ...</option>
                                    <option value="A">A</option>
                                    <option value="B">B</option>
                                    <option value="C">C</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">List Type</label>
                                <select name="<?php echo DBConfig::ATT_USERS_TYPE; ?>" required class="form-control">
                                    <option value="">Please Select ...</option>
                                    <option value="Prospective">Prospective</option>
                                    <option value="Current">Current</option>
                                    <option value="Both">Both</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary"><i class="fa fa-save fa-lg"></i>&nbsp;Save</button>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>


        <form action="<?php echo site_url(SiteConfig::CONTROLLER_HOME . SiteConfig::METHOD_HOME_DELETE_MULTI); ?>" method="POST">
            <div class="col-sm-12">
                <div class="col-sm-4">
                    <p>
                        <input type="checkbox" id="selecctall"/> Select All<br/>
                        <button type="submit" class="btn btn-danger"><i class="fa fa-edit fa-lg"></i>&nbsp;Delete</button>
                    </p>
                </div>


                <div class="col-sm-4">
                    <p>
                        <button  data-toggle="modal" data-target="#myModal" type="button" class="btn btn-success"><i class="fa fa-plus fa-lg"></i>&nbsp;Add New Customer</button>
                    </p>
                </div>

                <div class="col-sm-4">
                    <p>
                        <label for="exampleInputFile">Filter</label>
                        <select onchange="select_state(this.value);" name="<?php echo DBConfig::ATT_USERS_TYPE; ?>" required class="form-control">
                            <option value="">Please Select ...</option>
                            <option value="all">All State</option>
                            <?php
                            foreach ($cities as $city) {
                                ?>
                                <option value="<?php echo $city[DBConfig::ATT_USERS_STATE] ?>"><?php echo $city[DBConfig::ATT_USERS_STATE] ?></option>
                                <?php
                            }
                            ?>

                        </select>
                    </p>
                </div>
            </div>

            <div class="clearfix"></div>

            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Selection</th>
                        <th>Customer Id</th>
                        <th>Customer Name</th>
                        <th>State</th>
                        <th>Type</th>
                        <th>List Type</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    foreach ($users as $user) {
                        ?>

                        <tr>
                            <td><input type="checkbox" class="checkbox1" value="<?php echo $user[DBConfig::ATT_USERS_ID]; ?>" name="list[]"/></td>
                            <td><?php echo $user[DBConfig::ATT_USERS_ID]; ?></td>
                            <td><?php echo $user[DBConfig::ATT_USERS_NAME]; ?></td>
                            <td><?php echo $user[DBConfig::ATT_USERS_STATE]; ?></td>
                            <td><?php echo $user[DBConfig::ATT_USERS_USER_TYPE]; ?></td>
                            <td><?php echo $user[DBConfig::ATT_USERS_TYPE]; ?></td>
                            <td>
                                <a href="<?php echo site_url(SiteConfig::CONTROLLER_HOME . SiteConfig::METHOD_HOME_EDIT . '/' . $user[DBConfig::ATT_USERS_ID]) ?>" class="btn btn-info"><i class="fa fa-edit fa-lg"></i>&nbsp;Edit</a>
                                <button onclick="delete_user('<?php echo $user[DBConfig::ATT_USERS_ID]; ?>');" type="button" class="btn btn-danger"><i class="fa fa-edit fa-lg"></i>&nbsp;Delete</button>
                            </td>
                        </tr>

                        <?php
                    }
                    ?>

                </tbody>
            </table>

        </form>

    </div>
    <div class="panel-footer">Developed By Winexsoft Technology</div>
</div>
