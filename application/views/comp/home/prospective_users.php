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
</script>

<div class="panel panel-primary">

    <div class="panel-heading">
        <h3 class="panel-title">Prospective Users</h3>
    </div>

    <div class="panel-body">

        <form action="<?php echo site_url(SiteConfig::CONTROLLER_HOME . SiteConfig::METHOD_HOME_TRANSFER); ?>" method="POST">

            <p>
                <input type="checkbox" id="selecctall"/> Select All
                <button type="submit" class="btn btn-info"><i class="fa fa-try fa-lg"></i>&nbsp;Transfer to List 2</button>
                <select name="<?php echo DBConfig::ATT_USERS_USER_TYPE; ?>" required>
                    <option value="">Please Select ...</option>
                    <option value="A">A</option>
                    <option value="B">B</option>
                    <option value="C">C</option>
                </select>
            </p>

            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Selection</th>
                        <th>Customer Id</th>
                        <th>Customer Name</th>
                        <th>State</th>
                        <th>List Type</th>
<!--                        <th>Action</th>-->
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
                            <td><?php echo $user[DBConfig::ATT_USERS_TYPE]; ?></td>
    <!--                            <td>
                                <a href="<?php echo site_url(SiteConfig::CONTROLLER_HOME . SiteConfig::METHOD_HOME_TRANSFER_TO_LIST2 . '/' . $user[DBConfig::ATT_USERS_ID]) ?>" class="btn btn-info"><i class="fa fa-try fa-lg"></i>&nbsp;Transfer to List 2</a>
                            </td>-->
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
