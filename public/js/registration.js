var registration = {

	departments : {
		//CICS
		2 : {

			courses : [

				'BSIT',
				'BSCS',
				'BSIS'

			],

			course_ids : [

				2,3,4

			]

		},
		//CABA
		3 : {

			courses : [

				'ACT',
				'BSA',
				'BSBA',

			],

			course_ids : [

				5,6,7

			]

		},
		//CTE
		4 : {

			courses : [

				'JSC',
				'BEED-Gen ED',
				'BEED',
				'BSED'

			],

			course_ids : [

				8,9,10,11

			]

		},
		//High School
		5 : {

			courses : [

				'N/A'

			],

			course_ids : [

				1

			]

		},
		//UPHS
		6 : {

			courses : [

				'N/A'

			],

			course_ids : [

				1

			]

		}

	},

	init : function(){

		this.cacheDom();
		this.bindEvents();

	},

	cacheDom : function(){
		this.signup_container = $('#signup_container');
		this.select_departments = this.signup_container.find('#departments');
		this.select_courses = this.signup_container.find('#courses');

	},

	bindEvents : function(){

		this.select_departments.on('change',this.departmentChanged.bind(this));

	},

	departmentChanged : function(){

		this.renderCourses(this.select_departments.val());
	},

	renderCourses : function(department_id) {

		var courses = this.departments[department_id].courses;
		var course_ids = this.departments[department_id].course_ids;

		var html;

		for (var i = 0; i < courses.length; i++) {

			html += '<option value="'+course_ids[i]+'">'+courses[i]+'</option>';

		}

		this.select_courses.is(':disabled') ? this.select_courses.prop('disabled',false) : '' ;

		this.select_courses.html(html);

	}


};

registration.init();