import AdminLayout from '@/Layouts/AdminLayout.jsx';
import { Head } from '@inertiajs/react';
import StarRating from "@/Layouts/rate.jsx";

export default function Dashboard({ auth, users }) {
    return (
        <AdminLayout
            user={auth.user}
            header={<h2 className="font-semibold text-xl text-gray-800 leading-tight">Dashboard</h2>}
        >
            <Head title="Liste des Utilisateurs" />



                <div className="py-4">
                    <h1> Liste des utilisateurs</h1>
                    <div className="overflow-hidden rounded-lg border border-gray-200 shadow-md m-5">
                        <table className="w-full border-collapse bg-white text-left text-sm text-gray-500">
                            <thead className="bg-gray-50">
                            <tr>
                                <th scope="col" className="px-6 py-4 font-medium text-gray-900">N</th>
                                <th scope="col" className="px-6 py-4 font-medium text-gray-900">Name</th>
                                <th scope="col" className="px-6 py-4 font-medium text-gray-900"> Email</th>
                                <th scope="col" className="px-6 py-4 font-medium text-gray-900">Password</th>

                            </tr>
                            </thead>
                            <tbody className="divide-y divide-gray-100 border-t border-gray-100">
                            {users.map((user, n) => (
                                <tr className="hover:bg-gray-50">
                                    <td className="px-6 py-4">{n +1}</td>
                                    <th className="flex gap-3 px-6 py-4 font-normal text-gray-900">
                                        <div className="relative h-10 w-10">
                                            <img
                                                className="h-full w-full rounded-full object-cover object-center"
                                                src="https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                                alt=""
                                            />
                                            <span
                                                className="absolute right-0 bottom-0 h-2 w-2 rounded-full bg-green-400 ring ring-white"></span>
                                        </div>
                                        <div className="text-sm">
                                            <div className="font-medium text-gray-700">{user.name}</div>

                                        </div>
                                    </th>
                                    <td className="px-6 py-4">{user.email}</td>

                                    <td className="px-6 py-4">{user.password}</td>

                                </tr>

                            ))}
                            </tbody>
                        </table>
                    </div>
                </div>


        </AdminLayout>
    );
}



