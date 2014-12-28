var link;

function next()
{
	var site_num = get_num();
	site_num = parseInt(site_num) + 1;

	update_iframe_source(site_num);
}

function back()
{
	var site_num = get_num();

	if(site_num > 0)
	{
		site_num = parseInt(site_num) - 1;
	}

	update_iframe_source(site_num);
}

function get_num()
{
	link =         document.getElementById("iframe_preview").contentWindow.location.href;
	
	try
	{
		var host_query = link.split('?');
		var query = host_query[1];

		var query_site = query.split('=');
		var site = query_site[1];

		return site;
	}
	catch(err)
	{
		num = 0;
		//UPDATE QUERY
		link += "?site="+num;

		return num;
	}
}

function clear_site(site_num)
{
	var host_query = link.split('?');
	var host = host_query[0];
	var query = host_query[1];

	var query_site = query.split('=');
	var site = query_site[1];
	site = site_num;
	link = host + "?" + "site="+site;
}

function update_iframe_source(site_num)
{
	var element = document.getElementById("iframe_preview");

	clear_site(site_num);
	
	element.setAttribute("src",link);
}


