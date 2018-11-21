window.onload=function(){

    var svg = SVG('svg1').size("100%", 900);
    var links = svg.group();
    var markers = svg.group();
    var nodes = svg.group();
    var defs = svg.defs();

    var iconCoracao = svg.group()
    var anchorGroup = svg.group()

    var coracaoContorno = nodes.path('M19.4,38.9C8.7,38.9,0,30.2,0,19.5S8.7,0.1,19.4,0.1s19.4,8.7,19.4,19.4S30.1,38.9,19.4,38.9z M19.4,0.8C9.1,0.8,0.7,9.2,0.7,19.5c0,10.3,8.4,18.7,18.7,18.7s18.7-8.4,18.7-18.7C38.1,9.2,29.7,0.8,19.4,0.8z').fill("#FFF").opacity(1)

    var coracaoTransparencia = nodes.path('M38.5,19.4c0,10.5-8.5,19.1-19.1,19.1S0.4,30,0.4,19.4C0.4,8.9,8.9,0.4,19.4,0.4 S38.5,8.9,38.5,19.4').attr({opacity:0.3,'fill-rule':'evenodd','clip-rule':'evenodd',fill:'#FCFAFB',stroke:'#FFFFFF','stroke-width':0.7087})

    var coracaoFrequenciaInterna = nodes.path('M24.1,18.2l-1.7,4.2c-0.1,0.2-0.2,0.3-0.3,0.3c-0.1,0.1-0.2,0.2-0.4,0.2h-9.1   c-0.3,0-0.6-0.2-0.6-0.6c0-0.3,0.2-0.6,0.6-0.6h8.9l2.1-5.1c0.1-0.2,0.3-0.3,0.5-0.3c0.2,0,0.4,0.1,0.5,0.3l1.5,3.1    c2.3-5.4-0.7-9.7-4.9-9.7c-4.6,0-4.8,4.4-4.8,4.4h-0.3c0,0-0.2-4.4-4.8-4.4c-4.6,0-7.8,5.2-4.1,11.3c3.8,6.1,8.8,7.6,8.8,7.6h0.3 c0,0,5.1-1.5,8.8-7.6c0.1-0.1,0.1-0.2,0.2-0.4L24.1,18.2z').attr({'fill-rule':'evenodd', 'clip-rule':'evenodd',fill:'#FFFFFF'})

    var coracaoFrequenciaExterna = nodes.path('M34.4,21.8c0,0-5.9-0.1-6,0.1l-0.6,1l-1.3-2.6c-0.2,0.3-0.4,0.7-0.6,1.1c0,0-0.1,0.1-0.1,0.1 l1.4,2.9c0.1,0.3,0.5,0.4,0.7,0.3c0.1-0.1,0.7-1,1.1-1.6h5.4c0.3,0,0.6-0.3,0.6-0.6C35,22.1,34.7,21.8,34.4,21.8z').attr({'fill-rule':'evenodd', 'clip-rule':'evenodd',fill:'#7BCFDE'})

    iconCoracao.add(coracaoContorno)
    iconCoracao.add(coracaoTransparencia)
    iconCoracao.add(coracaoFrequenciaInterna)
    iconCoracao.add(coracaoFrequenciaExterna)
    iconCoracao.translate(600,450).draggy();

    // var anchor = nodes.path('m0,84c0,-45.643836 38.356164,-84 84,-84l182,0c45.643836,0 84,38.356164 84,84l0,225c0,45.643836 -38.356164,84 -84,84l-182,0c-45.643836,0 -84,-38.356164 -84,-84l0,-225z').attr({ 'stroke-opacity':"null", 'stroke-linecap':"null", 'stroke-linejoin':"null", 'stroke-width':"1.5", stroke:"#000", 'fill-opacity':"null", fill:"#fff"}).translate((document.body.clientWidth/2)-175,(document.body.clientHeight/2)-196).draggy();

    var anchorSVG = nodes.rect(350,393).translate((document.body.clientWidth/2)-175,(document.body.clientHeight/2)-196).draggy()
    anchorSVG.radius(84)

    anchorGroup.add(anchorSVG)

    var conn1 = iconCoracao.connectable({
        container: links,
        markers: markers,
        marker: 'default',
        targetAttach: 'perifery',
        sourceAttach: 'perifery',
        type: 'curved',
        color: '#2a88c9'
    }, anchorGroup);

/*
    var g1 = nodes.group().translate(400, 50).draggy();
    g1.circle(50).fill("#C2185B").opacity(0.8);

    var g2 = nodes.path('M230.59140014648438 334.4753723144531L246.7823944091797 279.7633972167969L301.40234375 300.3238067626953L229.5858612060547 334.8314208984375Z ').fill("#E91E63").opacity(0.6)
    g2.draggy();

    var g3 = nodes.group().translate(20, 20).draggy();
    g3.circle(80).fill("#FF5252").opacity(0.4);

    //var g3 = nodes.circle(80).fill("#FF5252").opacity(0.4).move(20,20);
    //g3.draggy();

    var g4 = nodes.circle(20).fill('#000000').opacity(0.6).draggy()

    var connectorpath = 'M0.34603601694107056 13.719420433044434C19.039979934692383 13.31098747253418 43.52296447753906 16.02077865600586 30.993101119995117 -6.703379154205322C36.599334716796875 -11.906962394714355 57.15462112426758 1.2759649753570557 62.7608528137207 6.479549884796143C99.10176849365234 6.479549884796143 101.08106231689453 -10.086503982543945 162.15802001953125 11.319366455078125C96.03795623779297 31.165008544921875 100.22242736816406 19.279720306396484 63.88154983520508 19.279720306396484C63.88154983520508 19.279720306396484 48.56324005126953 33.8869514465332 33.84909439086914 36.53312301635742C41.52180480957031 11.509580612182617 18.957279205322266 16.413288116455078 0.4546089470386505 17.141387939453125Z '
    var extraPointForSource = 'M0 15'
    var extraPointForTarget = 'M163 11.3'

    var connector = defs.path(extraPointForSource+extraPointForTarget+connectorpath).fill('#00ff4a').opacity(0.8)

    var conn1 = g1.connectable({
        container: links,
        markers: markers,
        marker: 'default',
        targetAttach: 'perifery',
        //sourceAttach: 'perifery',
        color: '#2a88c9'
    }, g2);


    var conn2 = g2.connectable({
        targetAttach: 'perifery',
        sourceAttach: 'perifery',
        type: 'curved'
    }, g3);
    conn2.setConnectorColor("#00ff4a")
    conn2.setMarker('default',markers)

    var connectorInUse = nodes.use(connector)

    var conn3 = g4.connectable({
        connector: connectorInUse,
        //targetAttach: 'perifery',
        //sourceAttach: 'perifery',
    }, g3);*/

}