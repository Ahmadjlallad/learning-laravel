# Blade component
- create a component dir in the view dir
- then the name of the file will be the component name but x will proceeds then name
  - like if the file named apex.blade.php component name will be x-apex
```injectablephp
   {{ $pathfinder }}
    {{ $slot }} is defualt slot
// in the view file 
<x-apex pathfinder="hello from component"> 
 
 </x-apex>
// or 
<x-apex pathfinder="hello from component"> 
    <x-slot name"pathfinder"> 
        hello pathfinder slot 
    </x-slot>
</x-apex>
<x-apex pathfinder="hello from component"> 
    <x-slot name"pathfinder"> 
        hello pathfinder slot 
    </x-slot>
</x-apex>
```
