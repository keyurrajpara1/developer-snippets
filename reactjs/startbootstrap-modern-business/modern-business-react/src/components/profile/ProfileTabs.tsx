import React, { useEffect, useState } from "react";
import { useLocation, useNavigate } from "react-router";
import { ProfileForm } from "./ProfileForm";
import { ChangePasswordForm } from "./ChangePasswordForm";
export function ProfileTabs() {
    const location = useLocation();
    const navigate = useNavigate();
    const [activeTab, setActiveTab] = useState<"profile" | "password">("profile");
    useEffect(() => {
        if (location.pathname === "/update-password") {
            setActiveTab("password");
        }
        else {
            setActiveTab("profile");
        }
    }, [location.pathname]);
    const handleTabChange = (tab: "profile" | "password") => {
        setActiveTab(tab);
        if (tab === "profile") {
            navigate("/my-profile");
        }
        else {
            navigate("/update-password");
        }
    };
    return (
        <div className="row gx-5">
            <div className="col-lg-3 mb-4">
                <div className="list-group">
                    <button type="button" className={`list-group-item list-group-item-action ${activeTab === "profile" ? "active" : ""}`} onClick={() => handleTabChange("profile")}>Update Profile</button>
                    <button type="button" className={`list-group-item list-group-item-action ${activeTab === "password" ? "active" : ""}`} onClick={() => handleTabChange("password")}>Change Password</button>
                </div>
            </div>
            <div className="col-lg-9">
                {activeTab === "profile" && <ProfileForm />}
                {activeTab === "password" && (<ChangePasswordForm />)}
            </div>
        </div>
    );
}