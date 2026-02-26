"use client";

import React from "react";
import { Table } from "react-bootstrap";
import Image from "next/image";
import Link from "next/link";

const campaignData = [
  {
    title: "Team Gateway",
    dateRange: "From 05 Oct - 17 Oct, 24",
    status: "Live Now",
    statusColor: "danger",
    platforms: ["/images/google3.svg"],
    teamMembers: [
      "/images/user-30.jpg",
      "/images/user-31.jpg",
      "/images/user-32.jpg",
    ],
  },
  {
    title: "Christmas Eve",
    dateRange: "From 10 Oct - 15 Oct, 24",
    status: "Live Now",
    statusColor: "danger",
    platforms: [
      "/images/facebook4.svg",
      "/images/instagram2.svg",
      "/images/google3.svg",
      "/images/linkedin2.svg",
    ],
    teamMembers: [
      "/images/user-16.jpg",
      "/images/user-17.jpg",
      "/images/user-18.jpg",
      "/images/user-19.jpg",
    ],
  },
  {
    title: "ThanksGiving",
    dateRange: "From 01 Oct - 05 Oct, 24",
    status: "Paused",
    statusColor: "danger",
    platforms: [
      "/images/facebook4.svg",
      "/images/google3.svg",
      "/images/linkedin2.svg",
    ],
    teamMembers: ["/images/user-25.jpg", "/images/user-28.jpg"],
  },
  {
    title: "Halloween",
    dateRange: "From 20 Oct - 31 Oct, 24",
    status: "Reviewing",
    statusColor: "danger",
    platforms: [
      "/images/facebook4.svg",
      "/images/instagram2.svg",
      "/images/google3.svg",
      "/images/linkedin2.svg",
    ],
    teamMembers: [
      "/images/user-16.jpg",
      "/images/user-17.jpg",
      "/images/user-18.jpg",
    ],
  },
  {
    title: "Teacher’s Day",
    dateRange: "From 08 Oct - 12 Oct, 24",
    status: "Reviewing",
    statusColor: "danger",
    platforms: ["/images/facebook4.svg", "/images/instagram2.svg"],
    teamMembers: [
      "/images/user-25.jpg",
      "/images/user-26.jpg",
      "/images/user-27.jpg",
    ],
  },
];

const PendingCampaigns = () => {
  return (
    <>
      <div
        className="default-table-area style-two campaigns-table overflow-y-auto"
        style={{ minHeight: "395px" }}
      >
        <div className="table-responsive">
          <Table className="table align-middle border-0">
            <tbody>
              {campaignData.map((campaign, index) => (
                <tr key={index}>
                  <td>
                    <div
                      className={`border-start border-2 border-${campaign.statusColor} ps-3 py-2`}
                    >
                      <h4 className="fs-14 fw-semibold mb-1">
                        {campaign.title}
                      </h4>
                      <span className="fs-12">{campaign.dateRange}</span>
                    </div>
                  </td>
                  <td>
                    <div className="d-flex gap-3 gap-xl-2 gap-xxl-3 flex-wrap">
                      {campaign.platforms.map((platform, pIndex) => (
                        <Image
                          key={pIndex}
                          src={platform}
                          alt="platform"
                          width={18}
                          height={18}
                        />
                      ))}
                    </div>
                  </td>
                  <td>
                    <span
                      className={`d-inline-block py-1 px-2 bg-${campaign.statusColor} bg-opacity-10 rounded-2 text-${campaign.statusColor}`}
                    >
                      {campaign.status}
                    </span>
                  </td>
                  <td>
                    <ul className="ps-0 mb-0 list-unstyled d-flex align-items-center">
                      {campaign.teamMembers.map((member, mIndex) => (
                        <li
                          key={mIndex}
                          className={mIndex > 0 ? "ms-m-15" : ""}
                        >
                          <Image
                            src={member}
                            className="wh-34 lh-34 rounded-circle border border-1 border-color-white"
                            alt="user"
                            width={34}
                            height={34}
                          />
                        </li>
                      ))}
                    </ul>
                  </td>
                  <td>
                    <Link
                      href="#"
                      className="rounded-circle d-inline-block text-center fs-18 hover-bg"
                      style={{
                        backgroundColor: "#ECEEF2",
                        width: "30px",
                        height: "30px",
                        lineHeight: "30px",
                      }}
                    >
                      <i className="ri-arrow-right-line"></i>
                    </Link>
                  </td>
                </tr>
              ))}
            </tbody>
          </Table>
        </div>
      </div>
    </>
  );
};

export default PendingCampaigns;
