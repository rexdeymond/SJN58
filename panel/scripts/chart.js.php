<script>
Highcharts.chart('container', {
    chart: {
        height: 600,
        inverted: true
    },

    title: {
        text: 'Peta Jaringan'
    },

    accessibility: {
        point: {
            descriptionFormat: '{add index 1}. {toNode.name}' +
                '{#if (ne toNode.name toNode.id)}, {toNode.id}{/if}, ' +
                'reports to {fromNode.id}'
        }
    },

    series: [{
        type: 'organization',
        name: 'Jaringan Member',
        keys: ['from', 'to'],
        data: [
            ['SJ24000001','SJ24060001'],
            ['SJ24000001','SJ24060002'],
            ['SJ24000001','SJ24060003'],
            ['SJ24000001','SJ24060004'],
            ['SJ24000001','SJ24060005']
            /*['SJ24060001','SJ24060006'],
            ['SJ24060001','SJ24060007'],
            ['SJ24060001','SJ24060008'],
            ['SJ24060001','SJ24060009'],
            ['SJ24060001','SJ24060010'],
            ['SJ24060002','SJ24060011'],
            ['SJ24060002','SJ24060012'],
            ['SJ24060002','SJ24060013'],
            ['SJ24060002','SJ24060014'],
            ['SJ24060002','SJ24060015'],
            ['SJ24060003','SJ24060016'],
            ['SJ24060003','SJ24060017']*/
        ],
        levels: [
            {
                level: 0,
                color: '#980104',
                dataLabels: {
                    color: 'white'
                },
                height: 5           
            }, 
            {
                level: 1,
                color: '#359154'
            }
        ],
        nodes: [
            {id:'SJ24000001',title:'SJ24000001',name:'Perusahaan',kodelvl:'1',kota:'Kota Malang',image:'https://dpmdkendal.net/dev/sjn/panel/assets/images/users/default.png'},
            {id:'SJ24060001',title:'SJ24060001',name:'S. WARLI 1',kodelvl:'11',kota:'Kab. Tanjung Jabung Timur',image:'https://dpmdkendal.net/dev/sjn/panel/assets/images/users/default.png'},
            {id:'SJ24060002',title:'SJ24060002',name:'NATANIEL',kodelvl:'12',kota:'Kab. Tanjung Jabung Timur',image:'https://dpmdkendal.net/dev/sjn/panel/assets/images/users/default.png'},
            {id:'SJ24060003',title:'SJ24060003',name:'DIAN PRATIDINA 01',kodelvl:'13',kota:'Kab. Batang',image:'https://dpmdkendal.net/dev/sjn/panel/assets/images/users/default.png'},
            {id:'SJ24060004',title:'SJ24060004',name:'PERUSAHAAN 2',kodelvl:'14',kota:'Kota Surabaya',image:'https://dpmdkendal.net/dev/sjn/panel/assets/images/users/default.png'},
            {id:'SJ24060005',title:'SJ24060005',name:'PERUSAHAAN 3',kodelvl:'15',kota:'Kab. Kulon Progo',image:'https://dpmdkendal.net/dev/sjn/panel/assets/images/users/default.png'},
          /*  {id:'SJ24060006',title:'SJ24060006',name:'PERUSAHAAN 4',kodelvl:'111',kota:'Kota Semarang',image:'https://dpmdkendal.net/dev/sjn/panel/assets/images/users/default.png'},
            {id:'SJ24060007',title:'SJ24060007',name:'PERUSAHAAN 5',kodelvl:'112',kota:'Kota Semarang',image:'https://dpmdkendal.net/dev/sjn/panel/assets/images/users/default.png'},
            {id:'SJ24060008',title:'SJ24060008',name:'PERUSAHAAN 6',kodelvl:'113',kota:'Kab. Tangerang',image:'https://dpmdkendal.net/dev/sjn/panel/assets/images/users/default.png'},
            {id:'SJ24060009',title:'SJ24060009',name:'PERUSAHAAN 7',kodelvl:'114',kota:'Kab. Tangerang',image:'https://dpmdkendal.net/dev/sjn/panel/assets/images/users/default.png'},
            {id:'SJ24060010',title:'SJ24060010',name:'PERUSAHAAN 8',kodelvl:'115',kota:'Kab. Ciamis',image:'https://dpmdkendal.net/dev/sjn/panel/assets/images/users/default.png'},
            {id:'SJ24060011',title:'SJ24060011',name:'Novarianus',kodelvl:'121',kota:'Kab. Ciamis',image:'https://dpmdkendal.net/dev/sjn/panel/assets/images/users/default.png'},
            {id:'SJ24060012',title:'SJ24060012',name:'LIONEL',kodelvl:'122',kota:'Kab. Semarang',image:'https://dpmdkendal.net/dev/sjn/panel/assets/images/users/default.png'},
            {id:'SJ24060013',title:'SJ24060013',name:'CRISTIANTO',kodelvl:'123',kota:'Kab. Sleman',image:'https://dpmdkendal.net/dev/sjn/panel/assets/images/users/default.png'},
            {id:'SJ24060014',title:'SJ24060014',name:'MBAK SUSAY',kodelvl:'124',kota:'Kota Bandung',image:'https://dpmdkendal.net/dev/sjn/panel/assets/images/users/default.png'},
            {id:'SJ24060015',title:'SJ24060015',name:'PERUSAHAAN 13',kodelvl:'125',kota:'Kota Bandung',image:'https://dpmdkendal.net/dev/sjn/panel/assets/images/users/default.png'},
            {id:'SJ24060016',title:'SJ24060016',name:'DIAN PRATIDINA 02',kodelvl:'131',kota:'Kab. Kendal',image:'https://dpmdkendal.net/dev/sjn/panel/assets/images/users/default.png'},
            {id:'SJ24060017',title:'SJ24060017',name:'DIAN PRATIDINA 03',kodelvl:'132',kota:'Kab. Kendal',image:'https://dpmdkendal.net/dev/sjn/panel/assets/images/users/default.png'}*/

        ],
        colorByPoint: false,
        color: '#007ad0',
        dataLabels: {
            color: 'white'
        },
        borderColor: 'white',
        nodeWidth: 'auto'
    }],
    tooltip: {
        outside: true
    },
    exporting: {
        allowHTML: true,
        sourceWidth: 900,
        sourceHeight: 600
    }

});
</script>