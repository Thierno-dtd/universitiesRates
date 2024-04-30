import { usePage} from "@inertiajs/react";

export function usePermission(){
    const hasRole = (name) => usePage().props.auth.user.roles.includes(name);
    const hasPremission = (name) => usePage().props.auth.user.permissions.includes(name);
    return { hasRole, hasPremission }
}
