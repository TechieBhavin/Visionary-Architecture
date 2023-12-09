import 'dart:convert';

import 'package:cached_network_image/cached_network_image.dart';
import 'package:flutter/material.dart';
import 'package:http/http.dart' as http;
import 'package:untitled/UI/shop/ViewproductPage.dart';

class ViewcategoryPage extends StatefulWidget {
  const ViewcategoryPage({Key? key}) : super(key: key);

  @override
  State<ViewcategoryPage> createState() => _ViewcategoryPageState();
}

class _ViewcategoryPageState extends State<ViewcategoryPage> {
  final List<String> imgList = [
    'https://images.unsplash.com/photo-1520342868574-5fa3804e551c?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=6ff92caffcdd63681a35134a6770ed3b&auto=format&fit=crop&w=1951&q=80',
    'https://images.unsplash.com/photo-1522205408450-add114ad53fe?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=368f45b0888aeb0b7b08e3a1084d3ede&auto=format&fit=crop&w=1950&q=80',
    'https://images.unsplash.com/photo-1519125323398-675f0ddb6308?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=94a1e718d89ca60a6337a6008341ca50&auto=format&fit=crop&w=1950&q=80',
    'https://images.unsplash.com/photo-1523205771623-e0faa4d2813d?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=89719a0d55dd05e2deae4120227e6efc&auto=format&fit=crop&w=1953&q=80',
    'https://images.unsplash.com/photo-1508704019882-f9cf40e475b4?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=8c6e5e3aba713b17aa1fe71ab4f0ae5b&auto=format&fit=crop&w=1352&q=80',
    'https://images.unsplash.com/photo-1519985176271-adb1088fa94c?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=a0c8d632e977f94e5d312d9893258f59&auto=format&fit=crop&w=1355&q=80'
  ];

  late Future<List?> alldata;

  var urlimg = "http://192.168.43.105/architecture/admin/uploads/category/";
  Future<List?> getcategorydata()async{

    Uri uri = Uri.parse("http://192.168.43.105/api/getcategory.php");
    var responce = await http.get(uri);

    if(responce.statusCode==200)
    {
      var body = responce.body.toString();
      var json = jsonDecode(body);
      return json;
    }
    else
    {
      print("api error");
    }

  }

  @override
  void initState() {
    // TODO: implement initState
    super.initState();
    setState(() {
      alldata = getcategorydata();
    });
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
        appBar: AppBar(title: Text("Category"),),
        body:SingleChildScrollView(
          child: Column(
            children: [
              Row(
                mainAxisAlignment: MainAxisAlignment.spaceBetween,
                children: <Widget>[
                  Padding(
                    padding: EdgeInsets.only(
                        top: 8.0, left: 8.0, right: 8.0),
                    child: Text('Popular Categories',
                        style: TextStyle(
                            color: Theme.of(context).colorScheme.secondary,
                            fontSize: 18,
                            fontWeight: FontWeight.w700)),
                  ),
                  Padding(
                    padding: const EdgeInsets.only(
                        right: 8.0, top: 8.0, left: 8.0),
                    child: ElevatedButton(
                        style: ElevatedButton.styleFrom(
                            primary: Theme.of(context).primaryColor
                        ),
                        child: Text('View All',
                            style: TextStyle(color: Colors.white)),
                        onPressed: () {
                          Navigator.of(context).push(
                              MaterialPageRoute(builder: (context) => ViewproductPage()));
                        }),
                  )
                ],
              ),
              Container(
                child: GridView.count(
                  shrinkWrap: true,
                  physics: NeverScrollableScrollPhysics(),
                  crossAxisCount: 2,
                  padding: EdgeInsets.only(
                      top: 8, left: 6, right: 6, bottom: 12),
                  children: List.generate(4, (index) {
                    return Container(
                      child: Card(
                        clipBehavior: Clip.antiAlias,
                        child: InkWell(
                          onTap: () {
                            print('Card tapped.');
                          },
                          child: Column(
                            crossAxisAlignment:
                            CrossAxisAlignment.start,
                            children: <Widget>[
                              SizedBox(
                                height:
                                (MediaQuery.of(context).size.width /
                                    2) -
                                    70,
                                width: double.infinity,
                                child: CachedNetworkImage(
                                  fit: BoxFit.cover,
                                  imageUrl: imgList[index],
                                  placeholder: (context, url) => Center(
                                      child:
                                      CircularProgressIndicator()),
                                  errorWidget: (context, url, error) =>
                                  new Icon(Icons.error),
                                ),
                              ),
                              ListTile(
                                  title: Text(
                                    'Two Gold Rings',
                                    style: TextStyle(
                                        fontWeight: FontWeight.w700,
                                        fontSize: 16),
                                  ))
                            ],
                          ),
                        ),
                      ),
                    );
                  }),
                ),
              ),
              Container(
                child: Padding(
                  padding: EdgeInsets.only(
                      top: 6.0, left: 8.0, right: 8.0, bottom: 10),
                  child: Image(
                    fit: BoxFit.cover,
                    image: AssetImage('assets/images/banner-2.png'),
                  ),
                ),
              )
            ],
          ),
        )

    );
  }
}