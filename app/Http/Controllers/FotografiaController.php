<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use App\Models\Fotografia;
use App\Models\FotoUser;
use App\Models\Portafolio;
use App\Models\Tarjeta;
use App\Models\User;
use App\Models\UserEvento;
use Aws\Rekognition\RekognitionClient;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;


use ElephantIO\Client;


class FotografiaController extends Controller
{
    public function create($evento_id)
    {
        return view('fotografias.create', compact('evento_id'));
    }


    public function store(Request $request, $id)

    {
        $event = Evento::find($id);

       



        /*  $url = 'https://mogi-web-service.onrender.com';
        $client = new Client(Client::engine(Client::CLIENT_4X, $url));
        $client->initialize();
        $client->of('/');
        $data = ['user_id' => 1, 'evento_id' => $event->id, 'foto_c' => '', 'evento_name' => $event->nombre, 'evento_lugar' => $event->lugar];
        $client->emit('notification_user', $data);

        $client->close();

        return $hola; */



        /*  $image1 = substr('https://mogi-aws-bucket.s3.amazonaws.com/user_5/1682602682perfil.jpg', 41, strlen('https://mogi-aws-bucket.s3.amazonaws.com/user_5/1682602682perfil.jpg'));

        $image2 = substr('https://mogi-aws-bucket.s3.amazonaws.com/evento_1/644a908cd517f.jpg', 41, strlen('https://mogi-aws-bucket.s3.amazonaws.com/evento_1/644a908cd517f.jpg'));

        $client = new RekognitionClient([
            'region' => 'us-east-1',
            'version' => 'latest',
        ]);
        $results = $client->compareFaces([
            'SimilarityThreshold' => 80,
            'SourceImage' => [
                'S3Object' => [
                    'Bucket' => 'mogi-aws-bucket',
                    'Name' => $image1
                ],
            ],
            'TargetImage' => [
                'S3Object' => [
                    'Bucket' => 'mogi-aws-bucket',
                    'Name' => $image2
                ],
            ],
        ]);

        $resultLabels = $results->get('FaceMatches');
        if (!empty($resultLabels)) {
            return 'Si';
        } else {
            return 'false';
        }
 */
        $users = User::all();
        $coincidencias = new Collection();

        $fotografia = new Fotografia();

        $fotografia->evento_id = $id;
        $fotografia->autor_id = Auth::user()->id;
        $fotografia->precio = $request->precio;
        $fotografia->tipo = $request->tipo;

        if ($request->hasFile('foto')) {
            // Obtenemos el archivo de imagen de la solicitud
            $imageFile = $request->file('foto');
            // Obtenemos la extensión del archivo de imagen
            $extension = $imageFile->getClientOriginalExtension();
            // Generamos un nombre de archivo único para la imagen
            $fileName = uniqid() . '.' . $extension;
            // Especificamos el directorio en Amazon S3
            $directory = 'evento_' . $id;
            // Subimos la imagen a Amazon S3 en el directorio especificado
            Storage::disk('s3')->putFileAs($directory, $imageFile, $fileName, 'public');
            // Obtenemos la URL de la imagen en Amazon S3
            $imageUrl = Storage::disk('s3')->url($directory . '/' . $fileName);

            $fotografia->foto = $imageUrl;




            /*  $coincidencias->dump();
            return $coincidencias; */

            /*  $image1 = substr(Auth::user()->photo1, 41, strlen(Auth::user()->photo1));

            $image2 = substr($fotografia->foto, 41, strlen($fotografia->foto));
    
            $client = new RekognitionClient([
                'region' => 'us-east-1',
                'version' => 'latest',
            ]);
            $results = $client->compareFaces([
                'SimilarityThreshold' => 80,
                'SourceImage' => [
                    'S3Object' => [
                        'Bucket' => 'mogi-aws-bucket',
                        'Name' => $image1
                    ],
                ],
                'TargetImage' => [
                    'S3Object' => [
                        'Bucket' => 'mogi-aws-bucket',
                        'Name' => $image2
                    ],
                ],
            ]);
    
            $resultLabels = $results->get('FaceMatches');
            if (!empty($resultLabels)) {
                return 'Si';
            } else {
                return 'false';
            } */




            // Reducimos la calidad de la imagen a 80% utilizando Intervention Image
            /* $compressedImage = Image::make($imageFile)
                ->encode('jpg', 1)
                ->stream($extension); */
            $imageFile2 = $request->file('foto');
            $image = Image::make($imageFile2);
            // Agregamos la marca de agua centrada y adecuada a la escala de la imagen
            $watermark = Image::make(public_path('img/picstore2.png'))->opacity(50);
            /* $watermark->greyscale(); */


            // Obtenemos las dimensiones de la imagen y de la marca de agua
            $imageWidth = $image->getWidth();
            $imageHeight = $image->getHeight();
            $watermarkWidth = $watermark->getWidth();
            $watermarkHeight = $watermark->getHeight();

            // Escalamos la marca de agua proporcionalmente al tamaño de la imagen
            $scale = min($imageWidth / $watermarkWidth, $imageHeight / $watermarkHeight);
            $watermarkWidthScaled = $watermarkWidth * $scale;
            $watermarkHeightScaled = $watermarkHeight * $scale;

            // Redimensionamos la marca de agua al tamaño deseado
            $watermark = $watermark->resize($watermarkWidthScaled, $watermarkHeightScaled);

            // Calculamos la posición de la marca de agua en la imagen escalada
            $positionX = ($imageWidth - $watermarkWidthScaled) / 2;
            $positionY = ($imageHeight - $watermarkHeightScaled) / 2;

            // Convertimos las coordenadas a enteros
            $positionX = intval($positionX);
            $positionY = intval($positionY);

            // Insertamos la marca de agua en la posición calculada
            $image->insert($watermark, 'top-left', $positionX, $positionY);


            // Redimensionamos la imagen a la mitad
            $width = $image->getWidth() / 2;
            $height = $image->getHeight() / 2;
            $image->resize($width, $height);
            // Codificamos la imagen como JPEG con una calidad del 75%
            $image->encode('jpg', 50);

            // Especificamos el nombre de archivo para la imagen comprimida
            $compressedFileName = uniqid() . 'compressed_' . $fileName;

            // Subimos la imagen comprimida a Amazon S3 en el mismo directorio
            /* Storage::disk('s3')->put($directory . '/' . $compressedFileName, $compressedImage, 'public'); */
            Storage::disk('s3')->put($directory . '/' . $compressedFileName, (string) $image, 'public');


            // Obtenemos la URL de la imagen comprimida en Amazon S3
            $compressedImageUrl = Storage::disk('s3')->url($directory . '/' . $compressedFileName);

            // Guardamos las URLs de ambas imágenes en la base de datos

            $fotografia->foto_c = $compressedImageUrl;
        }

        $fotografia->save();


        foreach ($users as $user) {

            if ($user->photo1) {

                $image1 = substr($user->photo1, 41, strlen($user->photo1));

                $image2 = substr($fotografia->foto, 41, strlen($fotografia->foto));

                $client = new RekognitionClient([
                    'region' => 'us-east-1',
                    'version' => 'latest',
                ]);
                $results = $client->compareFaces([
                    'SimilarityThreshold' => 80,
                    'SourceImage' => [
                        'S3Object' => [
                            'Bucket' => 'mogi-aws-bucket',
                            'Name' => $image1
                        ],
                    ],
                    'TargetImage' => [
                        'S3Object' => [
                            'Bucket' => 'mogi-aws-bucket',
                            'Name' => $image2
                        ],
                    ],
                ]);

                $resultLabels = $results->get('FaceMatches');

                if (!empty($resultLabels)) {
                    if ($user->rol == 'Invitado') {
                        $user_foto = new FotoUser();
                        $user_foto->estado = 'Sin Comprar';
                        $user_foto->foto_id = $fotografia->id;
                        $user_foto->user_id = $user->id;
                        $user_foto->save();


                        $user_event = UserEvento::where('user_id', $user->id)->where('evento_id', $fotografia->evento_id)->first();


                        if (!$user_event) {
                            $user_evento = new UserEvento();
                            $user_evento->estado = 'Invitado';
                            $user_evento->evento_id = $fotografia->evento_id;
                            $user_evento->user_id = $user->id;
                            $user_evento->save();
                        }


                        /*  $url = 'https://mogi-web-service.onrender.com';
                        $client = new Client(Client::engine(Client::CLIENT_4X, $url));
                        $client->initialize();
                        $client->of('/');
                        $data = ['user_id' => $user->id, 'evento_id' => $event->id, 'foto_c' => $fotografia->foto_c, 'evento_name' => $event->nombre, 'evento_lugar' => $event->lugar];
                        $client->emit('notification_user', $data);

                        $client->close(); */
                    }
                }
            }
        }



        return redirect()->route('eventos.edit', $id);
    }


    public function buy($id)
    {
        $fotografia = Fotografia::find($id);
        $users = User::all();

        $tarjetas = Tarjeta::all();
        return view('fotografias.buy', compact('fotografia', 'users', 'tarjetas'));
    }

    public function buyed(Request $request, $id)
    {
        $fotografia = Fotografia::find($id);

        $tarjeta = Tarjeta::where('id', $request->tarjeta)->first();

        $foto_user = FotoUser::where('user_id', Auth::user()->id)->where('foto_id', $fotografia->id)->first();

        if ($foto_user) {
            //PRIVADO
            $foto_user->tarjeta_id = $tarjeta->id;

            $foto_user->estado = 'Comprado';
            $foto_user->save();

            $tarjeta->gasto = $tarjeta->gasto + $fotografia->precio;
            $tarjeta->save();

            $tarjeta_autor = Tarjeta::where('user_id', $fotografia->autor_id)->first();
            $tarjeta_autor->saldo = $tarjeta_autor->saldo + $fotografia->precio;
            $tarjeta_autor->save();
        } else {
            //PUBLICO
            $foto_user = new FotoUser();
            $foto_user->estado = 'Comprado';
            $foto_user->user_id = Auth::user()->id;
            $foto_user->foto_id = $fotografia->id;
            $foto_user->tarjeta_id = $tarjeta->id;
            $foto_user->save();

            $tarjeta->gasto = $tarjeta->gasto + $fotografia->precio;
            $tarjeta->save();

            $tarjeta_autor = Tarjeta::where('user_id', $fotografia->autor_id)->first();
            $tarjeta_autor->saldo = $tarjeta_autor->saldo + $fotografia->precio;
            $tarjeta_autor->save();
        }



        $portafolios = Portafolio::where('user_id', Auth::user()->id)->get();

        $fotous = FotoUser::where('user_id', Auth::user()->id)->get();
        $fotos = Fotografia::all();

        return view('laravel-examples/user-profile', compact('portafolios', 'fotos', 'fotous'));
    }
}
