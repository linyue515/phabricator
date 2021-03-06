<?php

final class DifferentialParentRevisionsField
  extends DifferentialCustomField {

  public function getFieldKey() {
    return 'differential:depends-on';
  }

  public function getFieldKeyForConduit() {
    return 'phabricator:depends-on';
  }

  public function getFieldName() {
    return pht('Parent Revisions');
  }

  public function canDisableField() {
    return false;
  }

  public function getFieldDescription() {
    return pht('Lists revisions this one depends on.');
  }

  public function getProTips() {
    return array(
      pht(
        'Create a dependency between revisions by writing '.
        '"%s" in your summary.',
        'Depends on D123'),
    );
  }

  public function shouldAppearInConduitDictionary() {
    return true;
  }

  public function getConduitDictionaryValue() {
    return PhabricatorEdgeQuery::loadDestinationPHIDs(
      $this->getObject()->getPHID(),
      DifferentialRevisionDependsOnRevisionEdgeType::EDGECONST);
  }

}
