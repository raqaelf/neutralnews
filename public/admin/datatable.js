switch (content) {
	case 'banner' :
	column = [
		{data: 'id', name: 'id'},
		{data: 'title', name: 'title'},
		{data: 'description', name: 'description'},
		{data: 'action', name: 'action', orderable: false, searchable: false}
	]
	break;
	case 'roles' :
	column = [
		{data: 'id', name: 'id'},
		{data: 'name', name: 'name'},
		{data: 'action', name: 'action', orderable: false, searchable: false}
	]
	break;
	case 'permissions' :
	column = [
		{data: 'id', name: 'id'},
		{data: 'name', name: 'name'},
		{data: 'action', name: 'action', orderable: false, searchable: false}
	]
    break;
    case 'category' :
	column = [
		{data: 'id', name: 'id'},
		{data: 'name', name: 'name'},
		{data: 'action', name: 'action', orderable: false, searchable: false}
	]
    break;
    case 'article' :
	column = [
		{data: 'id', name: 'id'},
		{data: 'title', name: 'title'},
		{data: 'category.name', name: 'category'},
		{data: 'action', name: 'action', orderable: false, searchable: false}
	]
	break;
}

var table = $('#datatable').DataTable({
	autoWidth: true,
	processing: true,
	serverSide: true,
    responsive: true,
    autoWidth: true,
    order: [],
	ajax: url,
	language: {
		searchPlaceholder: 'Search...',
		sSearch: '',
		lengthMenu: '_MENU_ items/page'
	},
	columns: column
});
