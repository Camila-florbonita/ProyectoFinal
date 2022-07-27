function up()
{
    var nprendas = document.getElementById("nprendas").value;
    nprendas++;
    document.getElementById("nprendas").value = nprendas;
}

function down()
{
    var nprendas = document.getElementById("nprendas").value;
    if(nprendas > 1)
    {
        nprendas--;
        document.getElementById("nprendas").value = nprendas;
    }
    
}