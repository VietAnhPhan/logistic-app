import InputLabel from "@/Components/InputLabel";
import PrimaryButton from "@/Components/PrimaryButton";
import TextInput from "@/Components/TextInput";
import GuestLayout from "@/Layouts/GuestLayout";
import { Head, Link, useForm } from "@inertiajs/react";

export default function SenderRegister() {
    const { data, setData, post, processing, errors } = useForm({
        company_name: "",
        mobile: "",
        contact_email: "",
        address: "",
        password: "",
        password_confirmation: "",
    });

    function submit(e) {
        e.preventDefault();
        // Handle sender registration form submission
        post(route("senders.register"));
    }

    return (
        <GuestLayout>
            <Head title="Sender Register" />
            <div className="mb-4 text-sm text-gray-600">
                Register as a sender to manage your shipments and track
                deliveries with ease.
            </div>
            <form onSubmit={submit}>
                {/* Sender registration form fields go here */}

                {/* Company Name */}
                <div>
                    <InputLabel htmlFor="company_name" value="Company Name" />
                    <TextInput
                        id="company_name"
                        type="text"
                        name="company_name"
                        value={data.company_name}
                        onChange={(e) =>
                            setData("company_name", e.target.value)
                        }
                        className="mt-1 block w-full"
                        required
                    />
                </div>

                {/* Mobile Number */}
                <div className="mt-4">
                    <InputLabel htmlFor="mobil" value="Mobile Number" />
                    <TextInput
                        id="mobile"
                        type="text"
                        name="mobile"
                        value={data.mobile}
                        onChange={(e) => setData("mobile", e.target.value)}
                        className="mt-1 block w-full"
                        required
                    />
                </div>

                {/* Email address */}
                <div className="mt-4">
                    <InputLabel htmlFor="contact_email" value="Contact Email" />
                    <TextInput
                        id="contact_email"
                        type="email"
                        name="contact_email"
                        value={data.contact_email}
                        onChange={(e) =>
                            setData("contact_email", e.target.value)
                        }
                        className="mt-1 block w-full"
                        required
                    />
                </div>

                {/* Address */}
                <div className="mt-4">
                    <InputLabel htmlFor="address" value="Address" />
                    <TextInput
                        id="address"
                        type="text"
                        name="address"
                        value={data.address}
                        onChange={(e) => setData("address", e.target.value)}
                        className="mt-1 block w-full"
                        required
                    />
                </div>

                {/* Password */}
                <div className="mt-4">
                    <InputLabel htmlFor="password" value="Password" />
                    <TextInput
                        id="password"
                        type="password"
                        name="password"
                        value={data.password}
                        onChange={(e) => setData("password", e.target.value)}
                        className="mt-1 block w-full"
                        required
                    />
                    {errors.password && (
                        <div className="text-red-600 text-sm mt-1">
                            {errors.password}
                        </div>
                    )}
                </div>

                {/* Confirm Password */}
                <div className="mt-4">
                    <InputLabel
                        htmlFor="password_confirmation"
                        value="Confirm Password"
                    />
                    <TextInput
                        id="password_confirmation"
                        type="password"
                        name="password_confirmation"
                        value={data.password_confirmation}
                        onChange={(e) =>
                            setData("password_confirmation", e.target.value)
                        }
                        className="mt-1 block w-full"
                        required
                    />
                </div>

                <div className="flex items-center justify-end mt-4">
                    <Link
                        href={route("login")}
                        className="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    >
                        Already registered?
                    </Link>
                    <PrimaryButton className="ms-4">
                        Register as Sender
                    </PrimaryButton>
                </div>
            </form>
        </GuestLayout>
    );
}
