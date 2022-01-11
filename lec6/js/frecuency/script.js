var frequency1 = 0;
var frequency2 = 0;
var frequency3 = 0;
var frequency4 = 0;
var frequency5 = 0;
var frequency6 = 0;
var face;
var sum=0;

for(var roll=1; roll<=30; roll++)
{
    face = Math.floor(1 + Math.random()*5);

    switch(face)
    {
        case 1: 
            ++frequency1;
            break;
        case 2: 
            ++frequency2;
            break;
        case 3: 
            ++frequency3;
            break;
        case 4: 
            ++frequency4;
            break;
    
        case 5: 
            ++frequency6;
            break;
                
    }
    
}

document.writeln("<table border= \"1\" style='border-collapse: collapse'>");
document.writeln("<thead style='background-color: #FF7F50'><th>Face</th>" + "<th>Frequency</th></thead>"); //used style
document.writeln("<tbody style='background-color:#CCCCFF'> <tr><td>1</td><td>" + frequency1 + "</td><tr>");//used style
document.writeln("<td>2</td> <td>"+ frequency2 + "</td></tr><tr>" );
document.writeln("<td>3</td> <td>"+ frequency3 + "</td></tr><tr>" );
document.writeln("<td>4</td> <td>"+ frequency4 + "</td></tr><tr>" );
document.writeln("<td>5</td> <td>"+ frequency5 + "</td></tr><tr>" );
document.writeln("<td>6</td> <td>"+ frequency6 + "</td></tr></tbody></table>");

