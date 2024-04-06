package com.example.listview_demo;

import androidx.appcompat.app.AppCompatActivity;

import android.annotation.SuppressLint;
import android.os.Bundle;
import android.view.View;
import android.view.ViewGroup;
import android.widget.BaseAdapter;
import android.widget.ListView;
import android.widget.TextView;

import java.util.ArrayList;

public class MainActivity extends AppCompatActivity {

    ListView listViewProduct;

    ArrayList<Product> listProduct;
    ProductListViewAdapter productListViewAdapter;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        listProduct = new ArrayList<>();
        listProduct.add(new Product(1, "IP 6s", 500));
        listProduct.add(new Product(2, "IP 7", 5300));
        listProduct.add(new Product(3, "Sony xz", 4500));
        listProduct.add(new Product(4, "sp4", 300));
        listProduct.add(new Product(5, "sp5", 600));
        listProduct.add(new Product(6, "sp6", 800));
        listProduct.add(new Product(7, "sp7", 100));
        listProduct.add(new Product(8, "Isp8", 2500));

        listViewProduct = findViewById(R.id.listproduct);
        productListViewAdapter = new ProductListViewAdapter(listProduct) ;
        listViewProduct.setAdapter((productListViewAdapter));

    }

    static class Product{
        String name;
        int price;
        int productID;

        public Product(int productID,String name, int price) {
            this.name = name;
            this.price = price;
            this.productID = productID;
        }
        public String getName(){
            return name;

        }
        public int getPrice(){
            return price;
        }

    }

     static class ProductListViewAdapter extends BaseAdapter {


        // dl liên kết bởi Adapter là 1 mảng các sp
        final ArrayList<Product> listProduct;
        public ProductListViewAdapter(ArrayList<Product> listProduct) {
            this.listProduct = listProduct;
        }

        public int getCount(){
            // trả về số lượng ptu, nó được gọi bởi ListView
            return listProduct.size();
        }
        public Object getItem(int position){
            // trả về dl ở vtri position của Adapter, tương ứng là ptu
            // có chỉ số póition
            return listProduct.get(position);
        }

         @Override
         public long getItemId(int position) {
             // trả về 1 id của phần
             return listProduct.get(position).productID;
         }

        // @SuppressLint("DefaultLocale")
         public View getView(int position, View convertView, ViewGroup parent){
            // convertView là View của ptu ListView
            // nếu convertView != null --> View này được sd lại,
            //                              chỉ cần cập nật nội dung mới
            // nếu null --> cần tạo mới
            View viewProduct;

            if(convertView == null){
                //inflate: chuyển đổi 1 tệp xml -> đối tượng View
                viewProduct = View.inflate(parent.getContext(), R.layout.product_view, null);
            }
            else viewProduct = convertView;

            // Bind dl phần tử vào View
            Product product = (Product) getItem(position);
            ((TextView) viewProduct.findViewById(R.id.id_product)).setText(String.format("ID = %d",product.productID));
            ((TextView) viewProduct.findViewById(R.id.name_product)).setText(String.format("Tên SP = %s",product.name));
            ((TextView) viewProduct.findViewById(R.id.price_product)).setText(String.format("Giá = %d",product.price));

            return viewProduct;
        }

    }
}

