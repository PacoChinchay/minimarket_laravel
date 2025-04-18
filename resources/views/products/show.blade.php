<x-app-layout>
    <section>
      <a href="/products">volver</a>
        <div>
            <img src="{{$product->image}}" alt="{{$product->name}}">
        </div>
        <div>
            <h1>{{ $product->name }}</h1>
            <span>{{ $product->price }}</span>

            <div>
                <p>Categorías:
                    @foreach ($product->categories as $category)
                        <a href="/categories">{{ $category->name }},</a>
                    @endforeach
                </p>
            </div>
            <details name="product">
                <summary>Descripción</summary>
                {{ $product->description }}
                Cereal bañado con chocolate x 350 gr 😋🍫
                Contiene 5 cereales:
                ✅ Kiwicha
                ✅ Avena
                ✅ Trigo
                ✅ Maíz
                ✅ Arroz
                💛 Bañado con el más rico chocolate (37% cacao).
                👉 El complemento ideal para tu leche, yogurt o para tus tortas, helados, donuts, cupcakes o tu postre
                favorito
                🍪🧁🍩🎂🍨
            </details>
            <details name="product">
                <summary>Zonas de delibery</summary>
                Información sobre Pedidos y Envíos
                Zona 1: Barranco, San Isidro, Surquillo, Miraflores y Lince.

                Zona 2: Santiago de Surco, San Borja y Jesús María.

                Zona 3: Jesús María, La Victoria, Magdalena, Pueblo Libre, San Miguel, Breña y Lima.

                Zona 4: SJL, Santa Anita, ATE (hasta la altura del óvalo Mayorazgo) y La Molina.

                Zona 5: Callao, SMP, Los Olivos, Independencia, Lima y Comas.

                El servicio de delivery está disponible de lunes a viernes de 9 am a 6 pm con excepción de días
                feriados. La
                entrega son los viernes para todas las zonas.

                Por campañas será previa coordinación.

                Las fechas de entrega pueden variar también por feriados.

                En campañas pueden variar los días de reparto. Se estará coordinando con el cliente.

                Los pedidos recibidos después de las 3 pm, serán considerados como recibidos al día siguiente.

                Actualmente el delivery se está haciendo con personal propia y cumpliendo con el protocolo de higiene y
                seguridad recomendado.
                Es responsabilidad del cliente que la dirección indicada esté correcta y que haya alguna persona en la
                fecha y
                rango de horario pactados para recibir el producto. Cualquier error en la dirección o en la asignación
                de una
                persona responsable de recibir el pedido, implicará que el cliente tenga que volver a pagar por el envío
                y
                reprogramarlo.
                El pedido se entregará a cualquier persona que esté dentro del domicilio y lo reciba. En el caso de
                edificios
                multifamiliares o de oficinas el pedido podrá ser entregado al responsable de portería.
            </details>
            <details name="product">
                <summary>¿Ya lo probaste? ¡Cuéntanos que tal!</summary>
            </details>
        </div>
        <a href="/products/{{$product->id}}/edit">editar Producto</a>
        <form action="/products/{{$product->id}}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit">Eliminar producto</button>
        </form>
    </section>
</x-app-layout>
