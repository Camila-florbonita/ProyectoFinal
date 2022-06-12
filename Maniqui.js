
document.addEventListener('DOMContentLoaded', 
function Maniqui()
{    
    var scene = new THREE.Scene();    
    
    var camera = new THREE.PerspectiveCamera( 75, window.innerWidth/window.innerHeight, 0.1, 100 );
    
    var renderer = new THREE.WebGLRenderer();
    renderer.setSize( window.innerWidth, window.innerHeight );
    renderer.outputEncoding = THREE.sRGBEncoding;
    document.body.appendChild( renderer.domElement );

    var ambientLight = new THREE.AmbientLight(0xffffff, 0.6);
    scene.add(ambientLight);
    
    var directionalLight = new THREE.DirectionalLight(0xffffff, 0.8);
    directionalLight.position.set(200, 500, 300);
    scene.add(directionalLight); 
    scene.background = new THREE.Color(0xf5f5f5);

    var loader = new THREE.GLTFLoader();

    var man, woman;
    var jeansMan, jeansWoman;
    var shortsMan, shortsWoman;
    var shirtMan, shirtWoman;
    var hoodieMan, hoodieWoman;
    var skirt, dress;
    
    camera.position.z = 1.75;
    camera.position.y = 1;
       
    var shapeTexture =  new THREE.TextureLoader().load("ImagenesPrendas/51.jpg");
    
    var material = new THREE.MeshStandardMaterial( { map: shapeTexture } );    

    loader.load("mannequin/scene.gltf", function ( gltf ) 
    {
        man = gltf.scene;
        man.scale.set(1,1,1);
        man.position.set(0,0,0);
        scene.add( man );
    }, undefined, function ( error ) {
        console.error( error );
    } );

    loader.load("JeansMan/scene.gltf", function ( gltf ) 
    {
        jeansMan = gltf.scene;
        jeansMan.traverse( function(o) {
            if(o.isMesh) o.material = material;
        });
        jeansMan.scale.set(1,1,1);
        jeansMan.position.set(0,0,0);
        //scene.add( jeansMan );
     }, undefined, function ( error ) {
         console.error( error );
     } );

    loader.load("hoodieMan/scene.gltf", function ( gltf ) 
    {
        hoodieMan = gltf.scene;
        hoodieMan.traverse( function(o) {
            if(o.isMesh) o.material = material;
        });
        hoodieMan.scale.set(2.8,2.8,2.8);
        hoodieMan.position.set(0,-.15,.1);
        //scene.add( hoodieMan );
    }, undefined, function ( error ) {
        console.error( error );
    } );

    loader.load("shirtMan/scene.gltf", function ( gltf ) 
    {
        shirtMan = gltf.scene;
        shirtMan.traverse( function(o) {
            if(o.isMesh) o.material = material;
        });
        shirtMan.scale.set(.15,.148,.15);
        shirtMan.position.set(-.1,1,-.06);
        scene.add( shirtMan );
    }, undefined, function ( error ) {
        console.error( error );
    } );
    
    
    loader.load("shortsMan/scene.gltf", function ( gltf )
    {
        shortsMan = gltf.scene;
        shortsMan.traverse( function(o) {
            if(o.isMesh) o.material = material;
        });
        shortsMan.scale.set(.0035,.0036,.0035);
        shortsMan.position.set(-1.5,.54,-.085);
        shortsMan.rotation.set(0,3.1,0);
        //scene.add( shortsMan );
    }, undefined, function ( error ) {
        console.error( error );
    } );

    loader.load("mannequinWoman/scene.gltf", function ( gltf ) 
    {
        woman = gltf.scene;
        woman.scale.set(.001,.001,.001);
        woman.position.set(0,0,0);
        //scene.add( woman );
    }, undefined, function ( error ) {
        console.error( error );
    } );

    loader.load("JeansWoman/scene.gltf", function ( gltf ) //no le queda
    {
        jeansWoman = gltf.scene;
        jeansWoman.traverse( function(o) {
            if(o.isMesh) o.material = material;
        });
        jeansWoman.scale.set(.011,.013,.012);
        jeansWoman.position.set(0,.01,.08);
        //scene.add( jeansWoman );
     }, undefined, function ( error ) {
         console.error( error );
     } );

    loader.load("hoodieWoman/scene.gltf", function ( gltf ) //no le queda
    {
        hoodieWoman = gltf.scene;
        hoodieWoman.traverse( function(o) {
            if(o.isMesh) o.material = material;
        });
        hoodieWoman.scale.set(.9,.9,.9);
        hoodieWoman.position.set(0,1.3,0);
        //scene.add( hoodieWoman );
    }, undefined, function ( error ) {
        console.error( error );
    } );

    loader.load("shirtWoman/scene.gltf", function ( gltf ) 
    {
        shirtWoman = gltf.scene;
        shirtWoman.traverse( function(o) {
            if(o.isMesh) o.material = material;
        });
        shirtWoman.scale.set(.03,.01,.01);
        shirtWoman.position.set(0,2.36,0);
        shirtWoman.rotation.set(0,1.6,0);
        //scene.add( shirtWoman );
    }, undefined, function ( error ) {
        console.error( error );
    } );
    
    loader.load("shortsWoman/scene.gltf", function ( gltf )
    {
        shortsWoman = gltf.scene;
        shortsWoman.traverse( function(o) {
            if(o.isMesh) o.material = material;
        });
        shortsWoman.scale.set(.1,.1,.1);
        shortsWoman.position.set(0,-.3,0);
        //scene.add( shortsWoman );
    }, undefined, function ( error ) {
        console.error( error );
    } );

    loader.load("skirt/scene.gltf", function ( gltf )
    {
        skirt = gltf.scene;
        skirt.traverse( function(o) {
            if(o.isMesh) o.material = material;
        });
        skirt.scale.set(.00102,.00102,.00102);
        skirt.position.set(.01,-.1,.1);
        //scene.add( skirt );
    }, undefined, function ( error ) {
        console.error( error );
    } );

    loader.load("Dress/scene.gltf", function ( gltf )
    {
        dress = gltf.scene;
        dress.traverse( function(o) {
            if(o.isMesh) o.material = material;
        });
        dress.scale.set(.001,.001,.001);
        dress.position.set(0,.13,0);
        //scene.add( dress );
    }, undefined, function ( error ) {
        console.error( error );
    } );
       
       

       var animate = function () {
           requestAnimationFrame( animate );
           //man.rotation.y += 0.01;
           //jeansMan.rotation.y += 0.01;
           //shirtMan.rotation.y += 0.01;
           //shortsMan.rotation.z += 0.01;

           renderer.render( scene, camera );
        };
        animate();
        }, false)