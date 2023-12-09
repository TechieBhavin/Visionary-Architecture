import 'dart:convert';

import 'package:flutter/material.dart';
import 'package:google_maps_flutter/google_maps_flutter.dart';

import '../resource/UrlResourse.dart';
import 'package:http/http.dart' as http;
class ArchitectMap extends StatefulWidget {
  const ArchitectMap({Key? key}) : super(key: key);

  @override
  State<ArchitectMap> createState() => _ArchitectMapState();
}

class _ArchitectMapState extends State<ArchitectMap> {
  List? alldata1;
  List<dynamic> data = [];
  List<dynamic> _locations = [];
  getdata() async {

    Uri uri = Uri.parse(UrlResourse.GETARCHITECTMAP);
    var responce = await http.post(uri);
    if (responce.statusCode == 200) {
      var body = jsonDecode(responce.body);

      setState(() {
        data = body['data'] ;

      });
      final BitmapDescriptor customIcon = BitmapDescriptor.defaultMarker;
      for(int i = 0;i< data.length;i++){
        _markers.add(Marker(
          icon: customIcon,
          markerId: MarkerId('marker ${i}'),
          position: LatLng(double.parse(data[i]['lattitude']), double.parse(data[i]['longtitude'])),
          infoWindow: InfoWindow(
            title: 'Marker ${i}',
            snippet: 'This is marker ${i}',
          ),
        ));
      }
       // List jsonData = body['data'] as List;
      // return jsonData;
      // print("data = ${data}");
      print("_locations = ${data}");
      print("called2");
    } else {
      print("api error");
    }
  }
  late GoogleMapController _controller;
  static const LatLng _center = const LatLng(37.7749, -122.4194);
  final Set<Marker> _markers = {};

  void _onMapCreated(GoogleMapController controller) {
    print("called1");
    _controller = controller;

    // setState(() {
    //
    //   for (int i = 0; i < _locations.length; i++) {
    //     final location = _locations[i];
    //     final MarkerId markerId = MarkerId(location[i]);
    //     print("lat = ${double.parse(location['lattitude'])}");
    //     print("long = ${double.parse(location['longtitude'])}");
    //     final Marker marker = Marker(
    //       icon: customIcon,
    //       markerId: markerId,
    //       position: LatLng(
    //         double.parse(location['lattitude']),
    //         double.parse(location['longtitude']),
    //       ),
    //       infoWindow: InfoWindow(
    //         title: location['name'],
    //         snippet: location['address'],
    //       ),
    //     );
    //     _markers.add(marker);
    //   }
    // });
    
    
    setState((){
      final BitmapDescriptor customIcon = BitmapDescriptor.defaultMarker;
      print("customIcon = ${data.length}");



      // data.forEach((element) {
      //     _markers.add(Marker(
      //       icon: customIcon,
      //       markerId: MarkerId('marker${element['architect_id']}'),
      //       position: LatLng(double.parse(element['lattitude']), double.parse(element['longtitude'])),
      //       infoWindow: InfoWindow(
      //         title: 'Marker ${element['architect_id']}',
      //         snippet: 'This is marker ${element['architect_id']}',
      //       ),
      //     ));
      // });
     //  for(int i =0 ; i<data.length;i++)
     // {
     //   print("object");
     //   print("lat = ${double.parse(data[i]['lattitude'])}");
     //   print("long = ${double.parse(data[i]['longtitude'])}");
     //   _markers.add(Marker(
     //     icon: customIcon,
     //     markerId: MarkerId('marker${i}'),
     //     position: LatLng(double.parse(data[i]['lattitude']), double.parse(data[i]['longtitude'])),
     //     infoWindow: InfoWindow(
     //       title: 'Marker ${i}',
     //       snippet: 'This is marker ${i}',
     //     ),
     //   ));
     // }
     //  alldata1 =await getdata() as List;
     //  data!.forEach((row) {
     //    final location = _locations[row];
     //    final MarkerId markerId = MarkerId(location[row]);
     //    setState(() {
     //      print("demotest");
     //      print("object");
     //        print("lat = ${double.parse(row['lattitude'])}");
     //        print("long = ${double.parse(row['longtitude'])}");
     //      _markers.add(Marker(
     //        icon: customIcon,
     //        markerId: markerId,
     //        position: LatLng(
     //          double.parse(location['lattitude']),
     //          double.parse(location['longtitude']),
     //        ),
     //        infoWindow: InfoWindow(
     //          title: location['name'],
     //          snippet: location['address'],
     //        ),
     //      ));
     //    });
     //  });

    });
  }
  @override
  void initState() {
    // TODO: implement initState
    super.initState();
    // _markers.add(Marker(
    //   markerId: MarkerId("marker_1"),
    //   position: _center,
    //   infoWindow: InfoWindow(
    //     title: "Marker Title",
    //     snippet: "Marker Description",
    //   ),
    // ));
    getdata();
    // getAllqty();
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: Text("ArchitectMap"),
      ),
      body: GoogleMap(
        mapType: MapType.normal,
        onMapCreated: (controller) {
          _controller = controller;
        },
        markers: _markers,
        initialCameraPosition: CameraPosition(
          target: LatLng(21.170240,72.831062),
          zoom: 14.4746,
        ),
      ),
    );
  }
}
