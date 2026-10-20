import React from "react";
import { ProfileTabs } from "@/components/profile/ProfileTabs";
export default function ProfilePage() {
    return (
        <section className="py-5">
            <div className="container px-5">
                <ProfileTabs />
            </div>
        </section>
    );
}