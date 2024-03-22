<?php 


$picdata = mysqli_query($adb, "
      SELECT * 
      FROM   posts
      ORDER BY pdate
      ");
$userdata = mysqli_query($adb, "
      SELECT * 
      FROM   user
      ORDER BY udate
      ");
?>

<style>
      table, th, td {
            border      : 1px solid black ;
            padding     : 10px;
      }
      th {
            background-color: #6f1cff;
            color: white;
      }
      tr {
            background-color: white;
            color: black;
      }
      tr:nth-child(even) {
            background-color  : #D6EEEE;
      }     
</style>

<div class='keret'>

      <div class='belso bal'>
            <form method="get"> 
                <input type="submit" name="users" class="button" value="Users"/>
                <input type="submit" name="posts" class="button" value="Posts"/>
                <input type="submit" name="button3" class="button" value="TesztTeszt"/>
                <input type="submit" name="button4" class="button" value="TesztTeszt"/>
                <input type="hidden" name="p" value="adminpanel">
            </form>
      </div>

      <div class='belso jobb' >
            <h1>Adminpanel</h1>

<?php
    if(isset($_GET['users'])) 
    { 
        print "<table style=width:100%>
            <tr>
                <th>UserID        </th>
                <th>UserName        </th>
                <th>UserMail      </th>
                <th>UserProfilePic     </th>
                <th>RegDate      </th>
                <th>Permission</th>
            </tr>";
        while( $userdatarow = mysqli_fetch_array( $userdata ) )
        {
        print "
        		<tr>
            		<td>$userdatarow[uid]          </td>
            		<td>$userdatarow[uname]         </td>
            		<td>$userdatarow[umail]     </td>
            		<td>$userdatarow[uprofilepic]       </td>
            		<td>$userdatarow[udate]        </td>
				<td>$userdatarow[uperm]        </td>
        		</tr>
        	";
          }
          print "</table>"; 
    } 
    if(isset($_GET['posts'])) 
    { 
        print "<table style=width:100%>
            <tr>
                <th>PostID        </th>
                <th>UserID        </th>
                <th>FileName      </th>
                <th>PostTitle     </th>
                <th>PostDate      </th>
                <th>Action        </th>
            </tr>
			";
        while( $picdatarow = mysqli_fetch_array( $picdata ) )
        {
          	print "
            	<tr>
                	<td>$picdatarow[pid]          </td>
                	<td>$picdatarow[puid]         </td>
                	<td>$picdatarow[ppicture]     </td>
                	<td>$picdatarow[ptitle]       </td>
                	<td>$picdatarow[pdate]        </td>
                	<td>
                	    <a href='./?p=post&k=$picdatarow[ppicture]&c=$picdatarow[pid]'>
                	        <button>View</button>
                	    </a>
                	</td>
            	</tr>
            	";
        }
        print "</table>"; 
    } 
?> 

      </div>

</div>



