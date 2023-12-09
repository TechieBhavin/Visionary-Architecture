import 'package:cached_network_image/cached_network_image.dart';
import 'package:carousel_slider/carousel_slider.dart';
import 'package:flutter/material.dart';
import 'package:untitled/UI/architect/ArchitectMap.dart';
import 'package:untitled/UI/architect/ViewArchitectPage.dart';
import 'package:untitled/UI/article/ViewArticlesPage.dart';
import 'package:untitled/UI/auth/LoginPage.dart';
import 'package:untitled/UI/cart/Cartdetailspage.dart';
import 'package:untitled/UI/cart/ViewCartPage.dart';
import 'package:untitled/UI/cart/paymentsuccessfullpage.dart';
import 'package:untitled/UI/category/Viewcategory.dart';
import 'package:untitled/UI/feedback/FeedbackFormPage.dart';
import 'package:untitled/UI/offers/ViewOffers.dart';
import 'package:untitled/UI/orders/VieworderPage.dart';
import 'package:untitled/UI/orders/VieworderPage1.dart';


import 'package:untitled/UI/shop/ViewproductPage.dart';

class HomePage extends StatefulWidget {
  const HomePage({Key? key}) : super(key: key);

  @override
  State<HomePage> createState() => _HomePageState();
}

class _HomePageState extends State<HomePage> {
  final List<String> imgList = [
    'https://images.unsplash.com/photo-1520342868574-5fa3804e551c?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=6ff92caffcdd63681a35134a6770ed3b&auto=format&fit=crop&w=1951&q=80',
    'https://images.unsplash.com/photo-1522205408450-add114ad53fe?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=368f45b0888aeb0b7b08e3a1084d3ede&auto=format&fit=crop&w=1950&q=80',
    'https://images.unsplash.com/photo-1519125323398-675f0ddb6308?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=94a1e718d89ca60a6337a6008341ca50&auto=format&fit=crop&w=1950&q=80',
    'https://images.unsplash.com/photo-1523205771623-e0faa4d2813d?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=89719a0d55dd05e2deae4120227e6efc&auto=format&fit=crop&w=1953&q=80',
    'https://images.unsplash.com/photo-1508704019882-f9cf40e475b4?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=8c6e5e3aba713b17aa1fe71ab4f0ae5b&auto=format&fit=crop&w=1352&q=80',
    'https://images.unsplash.com/photo-1519985176271-adb1088fa94c?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=a0c8d632e977f94e5d312d9893258f59&auto=format&fit=crop&w=1355&q=80'
  ];

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      drawer: Drawer(
        child: ListView(
          children: <Widget>[
            ListTile(
              leading: Icon(Icons.home, color: Theme.of(context).colorScheme.secondary),
              title: Text('Home'),
              onTap: () {
                Navigator.pop(context);
              },
            ),
            ListTile(
              leading: Icon(Icons.shopping_basket,
                  color: Theme.of(context).colorScheme.secondary),
              title: Text('Shop'),
              trailing: Text('New',
                  style: TextStyle(color: Theme.of(context).primaryColor)),
              onTap: () {
                Navigator.of(context).push(
                    MaterialPageRoute(builder: (context) => ViewproductPage()));
              },
            ),
            ListTile(
              leading: Icon(Icons.shopping_cart,
                  color: Theme.of(context).colorScheme.secondary),
              title: Text('My Cart'),
              trailing: Container(
                padding: const EdgeInsets.all(10.0),
                decoration: new BoxDecoration(
                  shape: BoxShape.circle,
                  color: Theme.of(context).primaryColor,
                ),
                child: Text('2',
                    style: TextStyle(color: Colors.white, fontSize: 10.0)),
              ),
              onTap: () {
                Navigator.of(context).push(
                    MaterialPageRoute(builder: (context) => ViewCartPage()));
              },
            ),


            ListTile(
              leading:
              Icon(Icons.category,
                  color: Theme.of(context).colorScheme.secondary),
              title: Text('My Orders'),
              onTap: () {
                Navigator.of(context).push(
                    MaterialPageRoute(builder: (context) => VieworderPage()));
              },
            ),
            ListTile(
              leading:
              Icon(Icons.category,
                  color: Theme.of(context).colorScheme.secondary),
              title: Text('Map'),
              onTap: () {
                Navigator.of(context).push(
                    MaterialPageRoute(builder: (context) => ArchitectMap()));
              },
            ),
            ListTile(
              leading: Icon(Icons.person, color: Theme.of(context).colorScheme.secondary),
              title: Text('Architects'),
              onTap: () {
                Navigator.of(context).push(
                    MaterialPageRoute(builder: (context) => ViewArchitectPage()));
              },
            ),
            ListTile(
              leading: Icon(Icons.local_offer, color: Theme.of(context).colorScheme.secondary),
              title: Text('Best Offers'),
              onTap: () {
                Navigator.of(context).push(
                    MaterialPageRoute(builder: (context) => ViewOffers()));
              },
            ),
            ListTile(
              leading: Icon(Icons.feedback, color: Theme.of(context).colorScheme.secondary),
              title: Text('Feedback'),
              onTap: () {
                Navigator.of(context).push(
                    MaterialPageRoute(builder: (context) => FeedbackFormPage()));
              },
            ),
            ListTile(
              leading: Icon(Icons.article, color: Theme.of(context).colorScheme.secondary),
              title: Text('Articles'),
              onTap: () {
                Navigator.of(context).push(
                    MaterialPageRoute(builder: (context) => ViewArticlesPage()));
              },
            ),

            ListTile(
              leading: Icon(Icons.exit_to_app,
                  color: Theme.of(context).colorScheme.secondary),
              title: Text('Logout'),
              onTap: () {
                Navigator.of(context).push(
                    MaterialPageRoute(builder: (context) => LoginPage()));
              },
            )


          ],
        ),
      ),

      body: SafeArea(
        top: false,
        left: false,
        right: false,
        child: CustomScrollView(
          // Add the app bar and list of items as slivers in the next steps.
            slivers: <Widget>[
              SliverAppBar(
                // Provide a standard title.
                // title: Text('asdas'),
                // pinned: true,
                actions: <Widget>[
                  IconButton(
                    icon: Icon(Icons.shopping_cart),
                    onPressed: () {
                      Navigator.of(context).push(
                          MaterialPageRoute(builder: (context) => ViewCartPage()));
                    },
                  )
                ],
                // Allows the user to reveal the app bar if they begin scrolling
                // back up the list of items.
                // floating: true,
                // Display a placeholder widget to visualize the shrinking size.
                // flexibleSpace: HomeSlider(),
                // Make the initial height of the SliverAppBar larger than normal.
                expandedHeight: 300,
              ),
              SliverList(
                // Use a delegate to build items as they're scrolled on screen.
                delegate: SliverChildBuilderDelegate(
                  // The builder function returns a ListTile with a title that
                  // displays the index of the current item.
                      (context, index) => Column(
                    crossAxisAlignment: CrossAxisAlignment.start,
                    children: <Widget>[
                      Padding(
                        padding:
                        EdgeInsets.only(top: 14.0, left: 8.0, right: 8.0),
                        // child: Text(
                        //     AppLocalizations.of(context)!
                        //         .translate('NEW_ARRIVALS') ?? '',
                        //     style: TextStyle(
                        //         color: Theme.of(context).colorScheme.secondary,
                        //         fontSize: 18,
                        //         fontWeight: FontWeight.w700)),
                      ),
                      Row(
                        mainAxisAlignment: MainAxisAlignment.spaceBetween,
                        children: <Widget>[
                          Padding(
                            padding: EdgeInsets.only(
                                top: 8.0, left: 8.0, right: 8.0),
                            child: Text('Popular Architects',
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
                                      MaterialPageRoute(builder: (context) => ViewArchitectPage()));
                                }),
                          )
                        ],
                      ),
                      Container(
                        margin: EdgeInsets.symmetric(vertical: 8.0),
                        height: 240.0,
                        child: ListView(
                          scrollDirection: Axis.horizontal,
                          children: imgList.map((i) {
                            return Builder(
                              builder: (BuildContext context) {
                                return Container(
                                  width: 140.0,
                                  child: Card(
                                    clipBehavior: Clip.antiAlias,
                                    child: InkWell(
                                      onTap: () {
                                        Navigator.pushNamed(
                                            context, '/products',
                                            arguments: i);
                                      },
                                      child: Column(
                                        crossAxisAlignment:
                                        CrossAxisAlignment.start,
                                        children: <Widget>[
                                          SizedBox(
                                            height: 160,
                                            child: Hero(
                                              tag: '$i',
                                              child: CachedNetworkImage(
                                                fit: BoxFit.cover,
                                                imageUrl: i,
                                                placeholder: (context, url) =>
                                                    Center(
                                                        child:
                                                        CircularProgressIndicator()),
                                                errorWidget:
                                                    (context, url, error) =>
                                                new Icon(Icons.error),
                                              ),
                                            ),
                                          ),
                                          ListTile(
                                            title: Text(
                                              'Two Gold Rings',
                                              style: TextStyle(fontSize: 14),
                                            ),
                                            subtitle: Text('\$200',
                                                style: TextStyle(
                                                    color: Theme.of(context)
                                                        .colorScheme.secondary,
                                                    fontWeight:
                                                    FontWeight.w700)),
                                          )
                                        ],
                                      ),
                                    ),
                                  ),
                                );
                              },
                            );
                          }).toList(),
                        ),
                      ),
                      Container(
                        child: Padding(
                          padding:
                          EdgeInsets.only(top: 6.0, left: 8.0, right: 8.0),
                          child: Image(
                            fit: BoxFit.cover,
                            image: AssetImage('assets/images/banner-1.png'),
                          ),
                        ),
                      ),
                      Row(
                        mainAxisAlignment: MainAxisAlignment.spaceBetween,
                        children: <Widget>[
                          Padding(
                            padding: EdgeInsets.only(
                                top: 8.0, left: 8.0, right: 8.0),
                            child: Text('Shop By Category',
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
                                      MaterialPageRoute(builder: (context) => ViewcategoryPage()));
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
                  // Builds 1000 ListTiles
                  childCount: 1,
                ),
              )
            ]),


      ),
    );
  }
}
