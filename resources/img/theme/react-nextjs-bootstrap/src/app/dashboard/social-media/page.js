import FacebookCampaignOverview from "@/components/Dashboard/SocialMedia/FacebookCampaignOverview";
import FollowersByGender from "@/components/Dashboard/SocialMedia/FollowersByGender";
import LinkedinNetFollowers from "@/components/Dashboard/SocialMedia/LinkedinNetFollowers";
import RecentInstagramFollowers from "@/components/Dashboard/SocialMedia/RecentInstagramFollowers";
import SocialPlatformFollowers from "@/components/Dashboard/SocialMedia/SocialPlatformFollowers";
import Suggestions from "@/components/Dashboard/SocialMedia/Suggestions";
import UpgradeYourPlan from "@/components/Dashboard/SocialMedia/UpgradeYourPlan";
import { Row, Col } from "react-bootstrap";

export default function Page() {
  return (
    <>
      <Row>
        <Col xs={12} sm={12} md={12} lg={12} xl={12} xxl={6}>
          <SocialPlatformFollowers />
        </Col>

        <Col xs={12} sm={12} md={12} lg={12} xl={12} xxl={6}>
          <LinkedinNetFollowers />
        </Col>
      </Row>

      <Row>
        <Col xs={12} sm={12} md={12} lg={12} xl={5} xxl={4}>
          <Suggestions />
        </Col>

        <Col xs={12} sm={12} md={12} lg={12} xl={7} xxl={4}>
          <FollowersByGender />
        </Col>

        <Col xs={12} sm={12} md={12} lg={12} xl={7} xxl={4}>
          <RecentInstagramFollowers />
        </Col>
      </Row>

      <Row>
        <Col xs={12} sm={12} md={12} lg={12} xl={12} xxl={8}>
          <FacebookCampaignOverview />
        </Col>

        <Col xs={12} sm={12} md={12} lg={12} xl={12} xxl={4}>
          <UpgradeYourPlan />
        </Col>
      </Row>
    </>
  );
}
