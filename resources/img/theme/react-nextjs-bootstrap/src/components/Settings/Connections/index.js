"use client";

import { Table } from "react-bootstrap";
import Link from "next/link";
import Image from "next/image";

const Connections = () => {
  // Dynamic data for connected accounts
  const connectedAccounts = [
    {
      id: 1,
      icon: "/images/google2.svg",
      alt: "google2",
      name: "Google",
      description: "Calendar and Contacts",
    },
    {
      id: 2,
      icon: "/images/slack.svg",
      alt: "slack",
      name: "Slack",
      description: "Communications",
    },
    {
      id: 3,
      icon: "/images/git.svg",
      alt: "git",
      name: "Github",
      description: "Manage your Git repositories",
    },
    {
      id: 4,
      icon: "/images/mailchimp.svg",
      alt: "mailchimp",
      name: "Mailchimp",
      description: "Email marketing service",
    },
    {
      id: 5,
      icon: "/images/asana.svg",
      alt: "asana",
      name: "Asana",
      description: "Communication",
    },
  ];

  // Dynamic data for social accounts
  const socialAccounts = [
    {
      id: 1,
      icon: "/images/facebook3.svg",
      alt: "facebook2",
      name: "Facebook",
      description: "Calendar and Contacts",
    },
    {
      id: 2,
      icon: "/images/twitter.svg",
      alt: "twitter",
      name: "Twitter",
      description: "Communications",
    },
    {
      id: 3,
      icon: "/images/instagram.svg",
      alt: "instagram",
      name: "Instagram",
      description: "Manage your Git repositories",
    },
    {
      id: 4,
      icon: "/images/dribbble2.svg",
      alt: "dribbble2",
      name: "Dribbble",
      description: "Email marketing service",
    },
    {
      id: 5,
      icon: "/images/behance.svg",
      alt: "behance",
      name: "Behance",
      description: "Communication",
    },
  ];

  return (
    <>
      <h4 className="fs-18 mb-2">Connected Accounts</h4>

      <div className="default-table-area connected-table border-bottom pb-3 mb-4">
        <div className="table-responsive">
          <Table className="table align-middle border-0">
            <tbody>
              {connectedAccounts.map((account) => (
                <tr key={account.id}>
                  <td className="ps-0">
                    <div className="d-flex align-items-center">
                      <Image
                        src={account.icon}
                        alt={account.alt}
                        width={40}
                        height={40}
                      />
                      <div className="ms-3">
                        <span className="fw-semibold text-dark">
                          {account.name}
                        </span>
                        <p className="fs-14 text-body fw-normal">
                          {account.description}
                        </p>
                      </div>
                    </div>
                  </td>
                  <td className="text-end">
                    <Link
                      href="#"
                      className="text-decoration-none text-primary fs-14"
                    >
                      Click to Disconnect
                    </Link>
                  </td>
                </tr>
              ))}
            </tbody>
          </Table>
        </div>
      </div>

      <h4 className="fs-18 mb-2">Social Accounts</h4>

      <div className="default-table-area connected-table">
        <div className="table-responsive">
          <table className="table align-middle border-0">
            <tbody>
              {socialAccounts.map((account) => (
                <tr key={account.id}>
                  <td className="ps-0">
                    <div className="d-flex align-items-center">
                      <Image
                        src={account.icon}
                        alt={account.alt}
                        width={40}
                        height={40}
                      />
                      <div className="ms-3">
                        <span className="fw-semibold text-dark">
                          {account.name}
                        </span>
                        <p className="fs-14 text-body fw-normal">
                          {account.description}
                        </p>
                      </div>
                    </div>
                  </td>
                  <td className="text-end">
                    <Link
                      href="#"
                      className="text-decoration-none text-primary fs-14"
                    >
                      Click to Disconnect
                    </Link>
                  </td>
                </tr>
              ))}
            </tbody>
          </table>
        </div>
      </div>
    </>
  );
};

export default Connections;