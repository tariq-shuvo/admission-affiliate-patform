<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="monthly_earnings">
                <div class="title">
                    <h1>Earnings of the month</h1>
                </div>
                <div class="description">
                    <div class="title"><h3>Total Number of Referrals : <?php echo $result_affiliate[0]->referral_students; ?></h3></div>
                    <div class="title"><h3>Total Amount of Income : <?php echo $result_earnings[0]->total_earning==""?0:$result_earnings[0]->total_earning; ?> Tk.</h3></div>
                    <div class="title"><h3>Total Number of Rewards : <?php echo $result_rewards[0]->total_rewards; ?></h3></div>
                </div>
            </div>
            <div class="monthly_earning_form">
                <form action="" method="post" id="month_data">
                    <div class="row">
                        <div class="col-md-3 offset-md-2">
                            <div class="form-group">
                                <select class="form-control" id="month" name="month">
                                    <option value="0">Select Month</option>
                                    <option value="1"  <?php echo $month==1?"selected":""; ?>>January</option>
                                    <option value="2" <?php echo $month==2?"selected":""; ?>>February</option>
                                    <option value="3" <?php echo $month==3?"selected":""; ?>>March</option>
                                    <option value="4" <?php echo $month==4?"selected":""; ?>>April</option>
                                    <option value="5" <?php echo $month==5?"selected":""; ?>>May</option>
                                    <option value="6" <?php echo $month==6?"selected":""; ?>>June</option>
                                    <option value="7" <?php echo $month==7?"selected":""; ?>>July</option>
                                    <option value="8" <?php echo $month==8?"selected":""; ?>>August</option>
                                    <option value="9" <?php echo $month==9?"selected":""; ?>>September</option>
                                    <option value="10" <?php echo $month==10?"selected":""; ?>>October</option>
                                    <option value="11" <?php echo $month==11?"selected":""; ?>>November</option>
                                    <option value="12" <?php echo $month==12?"selected":""; ?>>December</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <select class="form-control" id="year" name="year">
                                    <option value="0">Select Year</option>
                                    <option value="2017" <?php echo $year==2017?"selected":""; ?>>2017</option>
                                    <option value="2018" <?php echo $year==2018?"selected":""; ?>>2018</option>
                                    <option value="2019" <?php echo $year==2019?"selected":""; ?>>2019</option>
                                    <option value="2020" <?php echo $year==2020?"selected":""; ?>>2020</option>
                                    <option value="2021" <?php echo $year==2021?"selected":""; ?>>2021</option>
                                    <option value="2022" <?php echo $year==2022?"selected":""; ?>>2022</option>
                                    <option value="2023" <?php echo $year==2023?"selected":""; ?>>2023</option>
                                    <option value="2024" <?php echo $year==2024?"selected":""; ?>>2024</option>
                                    <option value="2025" <?php echo $year==2025?"selected":""; ?>>2025</option>
                                    <option value="2026" <?php echo $year==2026?"selected":""; ?>>2026</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <button type="submit" class="btn btn-secondary">See Earnings</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>