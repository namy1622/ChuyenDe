package com.example.viewdiscovery;

import androidx.annotation.NonNull;
import androidx.appcompat.app.AppCompatActivity;

import android.graphics.Color;
import android.graphics.Typeface;
import android.os.Bundle;
import android.text.Html;
import android.text.SpannableString;
import android.text.method.LinkMovementMethod;
import android.text.style.BackgroundColorSpan;
import android.text.style.ClickableSpan;
import android.text.style.ForegroundColorSpan;
import android.text.style.RelativeSizeSpan;
import android.text.style.StrikethroughSpan;
import android.text.style.StyleSpan;
import android.text.style.SuperscriptSpan;
import android.text.style.URLSpan;
import android.text.style.UnderlineSpan;
import android.view.View;
import android.widget.TextView;
import android.widget.Toast;

public class MainActivity extends AppCompatActivity {

    TextView textView1 ;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        textView1 = findViewById(R.id.textview1);
        textView1.setText("Day la dong chu NEW");

        // cachs 1
//        String htmlcontent = "<h1>Đây là 1 HTML</h1>" +
//                            "<ul>" +
//                                "<li>Đây là phần tử 1</li>" +
//                                "<li>Đây là phần tử 2</li>" +
//                            "</ul>" +
//                            "<p><font color = red>Đây là</font> <strike>nội dung</strike> trong thẻ<b> the p</b></p>" +
//                            "<p><a href= \"\"a>Bấm vào đây</a></p>";
//        textView1.setText(Html.fromHtml(htmlcontent));

        //cach 2
        String noidung = "SannableString\n" +  // 0 - 14
                            "Chữ đậm\n" +   // 15 - 22
                            "Chữ nghiêng\n" +      // 23 -34
                            "Gạch chân\n" +     // 35 - 43
                            "Kẻ ngang\n" +  // 44-52
                            "Đổi màu\n" +   //
                            "12AM\n" +  //
                            "Click Here\n" ;    //

        // giốnng như settext nhưng có thể chỉnh, cài đặt cho nó
        SpannableString s = new SpannableString(noidung);

        // RelativeSizeSpan: thiết lập cỡ chữ tương đối
        s.setSpan(new RelativeSizeSpan(2f),0, 14, 0);

        //StyleSpan: thiết lập kiểu chữ, BOLD: chuwx đậm
        s.setSpan(new StyleSpan(Typeface.BOLD),15, 22, 0);
        s.setSpan(new StyleSpan(Typeface.ITALIC), 23, 34, 0);
        // gachj chân
        s.setSpan(new UnderlineSpan(),35, 44, 0);
        //gạch ngang
        s.setSpan(new StrikethroughSpan(),45, 53,0);
        // Đổi màu
        s.setSpan(new ForegroundColorSpan(Color.GREEN), 54, 61, 0);
        s.setSpan(new BackgroundColorSpan(Color.RED),15,34,0);

        // kí hiệu giờ (AM)
        s.setSpan(new SuperscriptSpan(),64, 66, 0);
        // thiết lập đương link
        s.setSpan(new URLSpan("https://xuanthulab.net"),67, 77, 0);

        s.setSpan(new ClickableSpan() {
            @Override
            public void onClick(@NonNull View widget) {
                Toast.makeText(MainActivity.this, "Bạn vừa bấm vào chữ",Toast.LENGTH_SHORT).show();
            }
        }, 35, 44,0);

        //thiết lập setMovementMethod để có thể bấm vào đường dẫn
        textView1.setMovementMethod(LinkMovementMethod.getInstance());

        textView1.setText(s);

        textView1.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
               // textView1.setText(null);
            }
        });

    }
}