<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/handsontable/dist/handsontable.full.min.css" />
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/handsontable/dist/handsontable.full.min.js"></script>
	
	<script src="https://cdn.jsdelivr.net/npm/handsontable@12.3/dist/handsontable.full.min.js"></script>
<link type="text/css" rel="stylesheet" href="https://cdn.jsdelivr.net/npm/handsontable@12.3/dist/handsontable.full.min.css" /> 
<script src="https://handsontable.com/docs/scripts/fixer.js"></script>

<script src="https://code.jquery.com/jquery-1.12.4.js"></script>

</head>
<body>
	<style>

.handsontable .truncated {
             white-space: nowrap;
                overflow: hidden;
                text-overflow: ellipsis;
        }

	</style>

<div id="data-table" class="hot nested handsontable htColumnHeaders" style="margin-top:20px"></div>

<div id="data-table1" class="hot nested handsontable htColumnHeaders" style="margin-top:20px"></div>

<script type="text/javascript">
   const container = document.getElementById('data-table');
   const container1 = document.getElementById('data-table1');
  
  const aData = [
    {available:1, users:'Claire', location:'los angeles', age:31},
    {available:0, users:'Jenny', location:'chicago', age:26},
    {available:0, users:'Tom', location:'new york', age:12},
    {available:0, users:'Barle', location:'Boston', age:17},
  ]
  const aData1 = [
    {available:1, users:'Claire', location:'los angeles', age:31},
	{available:0, users:'Barle', location:'Boston', age:17},
    {available:0, users:'Jenny', location:'chicago', age:26},
    {available:0, users:'Tom', location:'new york', age:12},
    {available:0, users:'Tom', location:'new york', age:12},
    {available:0, users:'Tom', location:'new york', age:12},
	{available:0, users:'Jenny', location:'chicago', age:26},
    {available:0, users:'Tom', location:'new york', age:12},
    {available:0, users:'Tom', location:'new york', age:12},
	{available:0, users:'Jenny', location:'chicago', age:26},
  ]
  
  const columns = [
	{  data: 'users', title:"User", width:100, readOnly: true},	
	{  data: 'location', title:"Notes", width:200, readOnly: true},	
	{  data: 'age', title:"age", width:200, readOnly: true},	
  ]
  const columns1 = [
	{  data: 'available', title:"User", width:100, readOnly: true, type:'checkbox',checkedTemplate:1, uncheckedTemplate:0},	
	{  data: 'users', title:"User", width:100, readOnly: true},	
	{  data: 'location', title:"Notes", width:200, readOnly: true},	
	{  data: 'age', title:"age", width:200, readOnly: true},	
  ]
  
  
const hot = new Handsontable(container, { 
			data: aData,
			columns: columns,
			manualColumnResize: true,
			dropdownMenu: true,
			dropdownMenu: ['filter_by_condition', 'filter_operators', 'filter_by_condition2','filter_by_value','filter_action_bar'],
			filters: true,
			licenseKey: 'non-commercial-and-evaluation',
 			 })
  
const hot1 = new Handsontable(container1, { 
			data: aData1,
			columns: columns1,
			manualColumnResize: true,
			dropdownMenu: true,
			dropdownMenu: ['filter_by_condition', 'filter_operators', 'filter_by_condition2','filter_by_value','filter_action_bar'],
			filters: true,
			licenseKey: 'non-commercial-and-evaluation',
})			

let arr = [];
const filtersPlugin = hot1.getPlugin('filters');

hot.addHook('afterFilter', function(column, conditon, optional){
	for(let row=0; row<hot.countRows(); row++){
		let filtered = hot.getDataAtRowProp(row,'users')
		arr.push(filtered)
	}

		filtersPlugin.clearConditions(1);
		filtersPlugin.filter();
		filtersPlugin.addCondition(1, 'by_value', [arr]);
		filtersPlugin.filter();		
		arr = [];
})


  </script>
</body>
</html>
