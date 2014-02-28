<link href="/cpoa/css/forms.css?$$REVISION$$" rel="stylesheet" type="text/css">
<script type="text/javascript" src="/cpoa/jQuerysrc/jquery.js"></script>
<table class ="userTbl">
    <tr>
        <td colspan="2" class ="usersFormHeaderTD">
            Users'Data
        </td>            
    </tr>
    <tr>
        <td class='usersDataLabels'>
            UserName
        </td>
        <td class='usersInputs'>
            <input id='userNameField' type='text' class ='inputFields'>
        </td>        
    </tr>
    <tr>
        <td class='usersDataLabels'>
            Password
        </td>
        <td class='usersInputs'>
            <input id='userNameField' type='password' class ='inputFields'>
        </td>        
    </tr> 
    <tr>
        <td class='usersDataLabels'>
            Access Level
        </td>
        <td class='usersInputs'>
            <select id='accessLevel' class ='selectFields'>
                <option value ='ADMIN'>ADMIN</option>
                <option value ='CLIENT'>CLIENT</option>
                <option value ='CUSTOMERSERVICE'>CUSTOMERSERVICE</option>
                <option value ='FINANCIAL'>FINANCIAL</option>
                <option value ='TELEMARKETER'>TELEMARKETER</option>
                <option value ='PROSPECTS'>PROSPECTS</option>
                <option value ='ACADEMIES'>ACADEMIES</option>
                <option value ='COACHEs'>COACHEs(?)</option>
            </select>
        </td>        
    </tr>   
    <tr>
        <td class='usersDataLabels'>
            Sales Rep.
        </td>
        <td class='usersInputs'>
            <select id=salRep' class ='selectFields'>
                <option value ='NULL'>Select</option>
            </select>
        </td>        
    </tr> 
    <tr>
        <td class='usersDataLabels'>
            Referral Rep.
        </td>
        <td class='usersInputs'>
            <select id='refRep' class ='selectFields'>
                <option value ='NULL'>Select</option>
            </select>
        </td>        
    </tr>  
    <tr>
        <td class='usersDataLabels'>
            Workgroup
        </td>
        <td class='usersInputs'>
            <select id='wrkg' class ='selectFields'>
                <option value ='LATAM'>LATAM</option>
                <option value ='USA'>USA</option>
            </select>
        </td>        
    </tr>   
    <tr>
        <td align="right">
            <input type="button" id ="reset" class="gomb2" value = " ReSet "> 
        </td>    
        <td align="left">
            <input type="button" id ="goUserForm" class="gomb2" value = " GO "> 
        </td>          
    </tr>    
</table>

