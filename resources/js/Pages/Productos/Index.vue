<!-- <template>
    <div>
        <h1>PRODUCTOS</h1>
    </div>
</template>
resources/js/Pages/Productos/Index.vue -->
<template>
  <div class="container mx-auto px-4 py-8">
    <div class="flex justify-between items-center mb-6">
      <h1 class="text-2xl font-bold">Lista de Productos</h1>
      <Link :href="route('productos.create')" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
        Crear Producto
      </Link>
    </div>

    <div class="bg-white shadow-md rounded-lg overflow-hidden">
      <table class="min-w-full">
        <thead class="bg-gray-50">
          <tr>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nombre</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Identificador</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Categoría</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Precio</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Stock</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Estado</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Acciones</th>
          </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
          <tr v-for="producto in productos.data" :key="producto.id">
            <td class="px-6 py-4 whitespace-nowrap">{{ producto.nombre }}</td>
            <td class="px-6 py-4 whitespace-nowrap">{{ producto.identificador }}</td>
            <td class="px-6 py-4 whitespace-nowrap">{{ producto.categoria?.nombre }}</td>
            <td class="px-6 py-4 whitespace-nowrap">${{ producto.precio }}</td>
            <td class="px-6 py-4 whitespace-nowrap">{{ producto.stock }}</td>
            <td class="px-6 py-4 whitespace-nowrap">
              <span :class="producto.estado ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800'" 
                    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full">
                {{ producto.estado ? 'Activo' : 'Inactivo' }}
              </span>
            </td>
            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
              <Link :href="route('productos.show', producto.id)" class="text-blue-600 hover:text-blue-900 mr-3">
                Ver
              </Link>
              <Link :href="route('productos.edit', producto.id)" class="text-indigo-600 hover:text-indigo-900 mr-3">
                Editar
              </Link>
              <button @click="confirmDelete(producto)" class="text-red-600 hover:text-red-900">
                Eliminar
              </button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>

    <div class="mt-4">
      <Pagination :links="productos.links" />
    </div>
  </div>
</template>

<script setup>
import { Link } from '@inertiajs/vue3';
import Pagination from '@/components/Pagination.vue';
import { router } from '@inertiajs/vue3';
import AppLayout from '@/layouts/AppLayout.vue';

defineProps({
  productos: Object
});

const confirmDelete = (producto) => {
  if (confirm('¿Estás seguro de que deseas eliminar este producto?')) {
    router.delete(route('productos.destroy', producto.id));
  }
};
</script>

<script>
export default {
  layout: AppLayout
}
</script>