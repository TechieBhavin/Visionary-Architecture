import 'package:flutter/material.dart';

class paymentsuccessfullpage extends StatefulWidget {
  const paymentsuccessfullpage({Key? key}) : super(key: key);

  @override
  State<paymentsuccessfullpage> createState() => _paymentsuccessfullpageState();
}

class _paymentsuccessfullpageState extends State<paymentsuccessfullpage> {
  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: Text("Payment successfull"),

      ),
      body: SingleChildScrollView(
          child: Container(
            color: Colors.green,
             alignment: FractionalOffset(0,0),
            child: Column(
              children: [
                Container(
                  child: Image.asset('assets/images/payment.jpg'),
                ),
                SizedBox(height: 20,),
                Container(
                  child: Text("Your Payment Successull !!",
                    style: (
                    TextStyle(
                      fontSize: 20,

                      fontWeight: FontWeight.bold,

                    )
                  ),),
                )
              ],
            ),

            constraints: BoxConstraints(
              maxHeight: 350,
              maxWidth: 400,
              minHeight: 100,
              minWidth: 100,
            ),margin: EdgeInsets.all(50),
          ),
      ),

    );
  }
}
