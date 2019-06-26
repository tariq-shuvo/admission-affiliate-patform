<section class="">
    <div class="container">

        <div class="row">
            <div class="col-lg-12 database">
                <p>Transaction Status</p>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <table class="table table-bordered text-center">
                    <thead>
                    <tr>
                        <th style="" scope="col">Serial</th>
                        <th style="" scope="col">Month</th>
                        <th style="" scope="col">Year</th>
                        <th style="" scope="col">Paid Amount</th>
                        <th style="" scope="col">Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    if(count($result)>0){
                        $i=1;
                        foreach ($result as $transactions) {
                            ?>
                            <tr>
                                <th scope="row"><?php echo $i; ?></th>
                                <td><?php echo $transactions->paid_month; ?></td>
                                <td><?php echo $transactions->paid_year; ?></td>
                                <td><?php echo $transactions->payment_amount; ?></td>
                                <td class="text-center"><span class="badge badge-success">Paid</span></td>
                            </tr>
                            <?php
                            $i++;
                        }
                    }else {
                        ?>
                        <tr>
                            <td colspan="5">No courses found.</td>
                        </tr>
                        <?php
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
<!--        <div class="row">-->
<!--            <div class="col-lg-12">-->
<!--                <nav aria-label="Page navigation example">-->
<!--                    --><?php //echo $pagination; ?>
<!--                </nav>-->
<!--            </div>-->
<!--        </div>-->
    </div>
</section>


