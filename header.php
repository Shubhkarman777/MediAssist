       <div class="row" style="height:70px; background-color:darksalmon">
            <div class="col-md-4 text-white" style="font-size:25px; font-family:cursive; padding-top:12px">Welcome:<input type="text" name="pid" id="pid" readonly value=<?php echo $_SESSION["uid"];?>></div>
            
            <div class="offset-7 mt-3">
               <form action="logout.php">
                <button type="submit" class="btn bg-white" name="btn" value="logout">LogOut</button>
                </form>
            </div>
        </div>