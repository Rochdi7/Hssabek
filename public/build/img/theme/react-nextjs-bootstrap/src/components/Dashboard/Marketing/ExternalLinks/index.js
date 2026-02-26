"use client";

import { Card } from "react-bootstrap";
import Image from "next/image";

const linksData = [
  {
    icon: "/images/google3.svg",
    name: "Google Ad Analytics",
    url: "https://analytics.google.com",
  },
  {
    icon: "/images/instagram2.svg",
    name: "Instagram Ads",
    url: "https://business.instagram.com/advertising",
  },
  {
    icon: "/images/facebook4.svg",
    name: "Facebook Ads",
    url: "https://www.facebook.com/business/ads",
  },
];

const ExternalLinks = () => {
  return (
    <Card className="bg-white border-0 rounded-3 mb-4">
      <Card.Body className="p-4">
        <div className="mb-4">
          <h3 style={{ marginBottom: "-2px" }}>External Links</h3>
        </div>

        <ul className="ps-0 mb-0 list-unstyled list-last-child">
          {linksData.slice(0, 3).map((link, index) => (
            <li
              key={index}
              className={`d-flex justify-content-between align-items-center ${
                index < linksData.length - 1 ? "border-bottom pb-3 mb-3" : ""
              }`}
            >
              <div className="d-flex justify-content-between align-items-center">
                <Image src={link.icon} alt={link.name.toLowerCase()} width={18} height={18} />
                <span className="text-primary fw-medium ms-2">{link.name}</span>
              </div>
              <a href={link.url} target="_blank" rel="noopener noreferrer" className="text-decoration-none">
                <i className="ri-external-link-line fs-20"></i>
              </a>
            </li>
          ))}
        </ul>
      </Card.Body>
    </Card>
  );
};

export default ExternalLinks;