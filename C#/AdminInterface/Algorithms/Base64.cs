using System;
using System.Drawing;
using System.Drawing.Imaging;
using System.IO;
using System.Windows.Media.Imaging;

namespace AdminInterface.Algorithms
{
    public class Base64
    {
        public static string Encode(string filePath)
        {
            Bitmap bitmap = new Bitmap((string)filePath);
            MemoryStream ms = new MemoryStream();
            bitmap.Save(ms, ImageFormat.Jpeg);
            byte[] byteImage = ms.ToArray();
            string base64 = Convert.ToBase64String(byteImage);
            return base64;
        }
        public static BitmapImage Decode(string base64)
        {
            byte[] binaryData = Convert.FromBase64String(base64);
            var image = new BitmapImage();
            image.BeginInit();
            image.StreamSource = new MemoryStream(binaryData);
            image.EndInit();
            return image;
        }
    }
}
