"use client";

import { Card } from "react-bootstrap";
import Image from "next/image";

const Profile = () => {
  // Example dynamic profile data
  const profileData = {
    name: "Sarah Johnson",
    email: "sarah@email.com",
    profileImage: "/images/user-70.png",
    agency: "Realty Group",
    phone: "(123) 456-7890",
    licenseNumber: "RE123456",
    yearsOfExperience: "10+",
    areasOfExpertise: "Residential Sales",
    location: "74 Grim Avenue, San Diego",
    socialLinks: {
      facebook: "https://www.facebook.com/",
      twitter: "https://www.twitter.com/",
      linkedin: "https://www.linkedin.com/",
    },
  };

  return (
    <>
      <Card className="border-0 rounded-3 bg-white mb-4 text-center position-relative overflow-hidden">
        <span
          className="bg-danger rounded-top-3 position-absolute z-n1 top-0 d-block w-100"
          style={{ height: "120px" }}
        ></span>

        <Image
          src="/images/shape-9.png"
          className="position-absolute top-0 start-0"
          alt="shape"
          width={65}
          height={65}
        />

        <Card.Body className="px-4 pb-4" style={{ paddingTop: "35px" }}>
          <Image
            src={profileData.profileImage}
            className="rounded-circle mb-4"
            alt="user"
            width={160}
            height={160}
          />

          <h3 className="fs-16 mb-0">{profileData.name}</h3>
          <span className="text-primary">{profileData.email}</span>

          <ul className="ps-0 my-4 list-unstyled d-flex flex-wrap justify-content-center gap-3">
            <li>
              <a
                href={profileData.socialLinks.facebook}
                target="_blank"
                className="d-inline-block text-center rounded-circle text-decoration-none text-white"
                style={{
                  width: "30px",
                  height: "30px",
                  lineHeight: "30px",
                  backgroundColor: "#3A559F",
                }}
              >
                <i className="ri-facebook-fill text-white"></i>
              </a>
            </li>
            <li>
              <a
                href={profileData.socialLinks.twitter}
                target="_blank"
                className="d-inline-block text-center rounded-circle text-decoration-none text-white"
                style={{
                  width: "30px",
                  height: "30px",
                  lineHeight: "30px",
                  backgroundColor: "#03A9F4",
                }}
              >
                <i className="ri-twitter-x-line text-white"></i>
              </a>
            </li>
            <li>
              <a
                href={profileData.socialLinks.linkedin}
                target="_blank"
                className="d-inline-block text-center rounded-circle text-decoration-none text-white"
                style={{
                  width: "30px",
                  height: "30px",
                  lineHeight: "30px",
                  backgroundColor: "#007AB9",
                }}
              >
                <i className="ri-linkedin-fill text-white"></i>
              </a>
            </li>
          </ul>

          <ul className="ps-0 mb-0 list-unstyled">
            <li className="d-flex justify-content-between align-items-center mb-3">
              <span className="text-secondary">Agency:</span>
              <span>{profileData.agency}</span>
            </li>
            <li className="d-flex justify-content-between align-items-center mb-3">
              <span className="text-secondary">Phone:</span>
              <span>{profileData.phone}</span>
            </li>
            <li className="d-flex justify-content-between align-items-center mb-3">
              <span className="text-secondary">License Number:</span>
              <span>{profileData.licenseNumber}</span>
            </li>
            <li className="d-flex justify-content-between align-items-center mb-3">
              <span className="text-secondary">Years of Experience:</span>
              <span>{profileData.yearsOfExperience}</span>
            </li>
            <li className="d-flex justify-content-between align-items-center mb-3">
              <span className="text-secondary">Areas of Expertise:</span>
              <span>{profileData.areasOfExpertise}</span>
            </li>
            <li className="d-flex justify-content-between align-items-center mb-0">
              <span className="text-secondary">Location:</span>
              <span>{profileData.location}</span>
            </li>
          </ul>
        </Card.Body>
      </Card>
    </>
  );
};

export default Profile;
